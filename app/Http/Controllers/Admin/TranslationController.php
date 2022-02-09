<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use App\Models\Translation;
use App\Models\TranslationKey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class TranslationController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $pageTitle = 'ایجاد دسته بندی جدید';
        $breadcrumb = [route('translations.index') => 'ترجمه ها'];
        $pageBc = 'دسته بندی جدید';
        $pageSubtitle = 'برای ایجاد دسته جدید، یک عنوان دلخواه و نامک یکتا انتخاب کنید.';
        return view('admin.translations.create', compact('pageTitle', 'breadcrumb', 'pageBc', 'pageSubtitle'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $data = $this->validate($request, [
            'model' => 'nullable|sometimes|string|in:setting,translationkey',
            'translatable_id' => 'required|integer|exists:settings,id',
            'translation' => 'required|string',
            'language' => 'required|string|exists:languages,code',
        ]);

        $data['model'] == 'setting' ? $data['translatable_type'] = Setting::class : $data['translatable_type'] = TranslationKey::class;
        Translation::create($data);
        \App\Libraries\Translation\Translation::clearCache();

        if ($data['model'] == 'setting')
            return redirect('admin/settings')->with('flash_message', 'ترجمه جدید اضافه شد');
        if ($data['model'] == 'translationkey')
            return redirect('admin/translationkey')->with('flash_message', 'ترجمه جدید اضافه شد');
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */


    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {

        $translation = Translation::findOrFail($id);
        $pageTitle = 'ویرایش دسته';
        $breadcrumb = [route('translationkey.index') => 'دسته بندی ها'];
        $pageBc = 'ویرایش دسته';
        $pageSubtitle = '';
        return view('admin.translations.edit', compact('translation', 'pageTitle', 'breadcrumb', 'pageBc', 'pageSubtitle'));

    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            'translation' => 'required|string',
        ]);
        $translation = Translation::findOrFail($id);
        $translation->update($data);
        \App\Libraries\Translation\Translation::clearCache();
        if ($translation->translatable_type == Setting::class) {
            return redirect('admin/settings')->with('flash_message', 'ویرایش انجام شد!');
        }
        return redirect('admin/translationkey')->with('flash_message', 'ویرایش انجام شد!');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Translation::destroy($id);
        \App\Libraries\Translation\Translation::clearCache();
        return redirect('admin/translationkey')->with('flash_message', 'دسته بندی حذف شد!');
    }
}
