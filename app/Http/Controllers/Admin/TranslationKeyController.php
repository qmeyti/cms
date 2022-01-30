<?php

namespace App\Http\Controllers\Admin;

use App\Models\Language;
use Illuminate\Http\Request;
use App\Models\TranslationKey;
use App\Http\Controllers\Controller;
// TransitionKeyController

class TranslationKeyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // dd('hi');

        // \App\Libraries\Translation\Translation::clearCache();

        $keyword = $request->get('search');
        // $perPage = __stg('element_per_page', 25);
        $perPage =25 ;


        if (!empty($keyword)) {
            $translationkey = TranslationKey::where('key', 'LIKE', "%$keyword%")
                ->orWhere('side', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $translationkey = TranslationKey::latest()->paginate($perPage);
        }
        $languages = Language::all();
        $pageTitle = 'دسته بندی ها';
        $breadcrumb = [];
        $pageBc = 'لیست دسته بندی ها';
        $pageSubtitle = '';

        return view('admin.translationkey.index', compact('translationkey', 'pageTitle', 'breadcrumb', 'pageBc', 'pageSubtitle','languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
//        dd('hi');
        $pageTitle = 'ایجاد دسته بندی جدید';
        $breadcrumb = [route('translationkey.index') => 'ترجمه ها'];
        $pageBc = 'دسته بندی جدید';
        $pageSubtitle = 'برای ایجاد دسته جدید، یک عنوان دلخواه و نامک یکتا انتخاب کنید.';

        // dd($_REQUEST['language']);
        // Session::flash('language',$_REQUEST['language']);
        // Session::flash('parent',$_REQUEST['parent']);
        return view('admin.translationkey.create', compact('pageTitle', 'breadcrumb', 'pageBc', 'pageSubtitle'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'key' => 'required|string||regex:!^[a-zA-Z0-9\-_.]+$!|max:100',
            'side' => 'required|string||regex:!^[a-zA-Z0-9\-_.]+$!|max:100',
        ]);

        TranslationKey::create($data);
        \App\Libraries\Translation\Translation::clearCache();
        return redirect('admin/translationkey')->with('flash_message', 'دسته بندی اضافه شد.');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $translationkey = TranslationKey::findOrFail($id);

        $pageTitle = 'نمایش دسته';
        $breadcrumb = [route('category.index') => 'دسته بندی ها'];
        $pageBc = 'نمایش دسته';
        $pageSubtitle = '2نمایش دسته';

        return view('admin.translationkey.show', compact('translationkey', 'pageTitle', 'breadcrumb', 'pageBc', 'pageSubtitle'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $translationkey = TranslationKey::findOrFail($id);
        $pageTitle = 'ویرایش دسته';
        $breadcrumb = [route('translationkey.index') => 'دسته بندی ها'];
        $pageBc = 'ویرایش دسته';
        $pageSubtitle = '';

        return view('admin.translationkey.edit', compact('translationkey', 'pageTitle', 'breadcrumb', 'pageBc', 'pageSubtitle'));
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
            'key' => 'required|string||regex:!^[a-zA-Z0-9\-_.]+$!|max:100',
            'side' => 'required|string||regex:!^[a-zA-Z0-9\-_.]+$!|max:100',
            ]);


        $translationkey = TranslationKey::findOrFail($id);

        $translationkey->update($data);
        \App\Libraries\Translation\Translation::clearCache();
        return redirect('admin/translationkey')->with('flash_message', 'ویرایش انجام شد!');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        TranslationKey::destroy($id);
        \App\Libraries\Translation\Translation::clearCache();
        return redirect('admin/translationkey')->with('flash_message', 'دسته بندی حذف شد!');
    }
}
