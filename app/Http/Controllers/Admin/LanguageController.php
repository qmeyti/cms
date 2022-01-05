<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 15;

        if (!empty($keyword)) {

            $languages = Language::where('code', 'LIKE', "%$keyword%")
                ->orWhere('label', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);

        } else {

            $languages = Language::paginate($perPage);

        }

        $pageTitle = 'چند زبان';
        $breadcrumb = [];
        $pageBc = 'زبان ها';
        $pageSubtitle = '';
        return view('admin.languages.index', compact('languages', 'pageTitle', 'breadcrumb', 'pageBc', 'pageSubtitle'));

    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {

        $pageTitle = 'ایجاد زبان جدید';
        $pageBc = 'ایجاد زبان';
        $pageSubtitle = '';

        return view('admin.languages.create', compact('pageTitle', 'pageBc', 'pageSubtitle'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        __sanitize('language_name');

        $data = $request->validate([
            'code' => 'required|string|max:2|min:2|regex:![a-zA-Z0-9]{2}!',
            'language_name' => 'required|string|max:20|min:1',
        ], [], [
            'code' => 'کد',
            'language_name' => 'نام زبان',
        ]);

        $data['code'] = strtolower($data['code']);

        Language::create($data);

        return redirect()->route('languages.index')->with('flash_message', 'زبان جدید ایجاد شد');

    }

    /**
     * @param Request $request
     * @param Language $language
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Request $request, Language $language)
    {
        $pageTitle = 'مشاهده زبان';
        $pageBc = 'زبان';
        $pageSubtitle = '';

        return view('admin.languages.show', compact('language', 'pageTitle', 'pageBc', 'pageSubtitle'));
    }

    /**
     * @param Request $request
     * @param Language $language
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Request $request, Language $language)
    {
        $pageTitle = 'ویرایش زبان';
        $breadcrumb = [route('languages.index') => 'لیست زبان ها'];
        $pageBc = 'ویرایش زبان';
        $pageSubtitle = '';

        return view('admin.languages.edit', compact('language', 'pageTitle', 'breadcrumb', 'pageBc', 'pageSubtitle'));
    }

    /**
     * @param Request $request
     * @param Language $language
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Language $language)
    {
        __sanitize('language_name');

        $data = $request->validate([
            'code' => 'required|string|max:2|min:2|regex:![a-zA-Z0-9]{2}!',
            'language_name' => 'required|string|max:20|min:1',
        ], [], [
            'code' => 'کد',
            'language_name' => 'نام زبان',
        ]);

        $data['code'] = strtolower($data['code']);

        $language->update($data);

        return redirect()->route('languages.index')->with('flash_message', 'زبان با موفقیت ویرایش شد');
    }

    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, int $id)
    {
        Language::destroy($id);

        return redirect()->route('languages.index')->with('flash_message', 'زبان حذف شد!');
    }

    /**
     * Language switcher
     *
     * @param Request $request
     * @param string $lang
     * @return \Illuminate\Http\RedirectResponse
     */
    public function switch(Request $request, string $lang)
    {
        $language = \App\Libraries\Repository\Locale\LocaleRepository::find($lang);

        if (!is_null($language)) {

            $dir = $language->dir;

            \session()->put('locale', $lang);

            \session()->put('dir', $dir);

            return redirect()->back();

        }

        return redirect()->back();
    }
}
