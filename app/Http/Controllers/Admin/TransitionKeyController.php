<?php

namespace App\Http\Controllers\Admin;

use App\Models\Language;
use Illuminate\Http\Request;
use App\Models\TransitionKey;
use App\Http\Controllers\Controller;
// TransitionKeyController

class TransitionKeyController extends Controller
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
            $transitionkey = TransitionKey::where('key', 'LIKE', "%$keyword%")
                ->orWhere('side', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $transitionkey = TransitionKey::latest()->paginate($perPage);
        }
        $languages = Language::all();
        $pageTitle = 'دسته بندی ها';
        $breadcrumb = [];
        $pageBc = 'لیست دسته بندی ها';
        $pageSubtitle = '';

        return view('admin.transitionkey.index', compact('transitionkey', 'pageTitle', 'breadcrumb', 'pageBc', 'pageSubtitle','languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $pageTitle = 'ایجاد دسته بندی جدید';
        $breadcrumb = [route('transitionkey.index') => 'ترجمه ها'];
        $pageBc = 'دسته بندی جدید';
        $pageSubtitle = 'برای ایجاد دسته جدید، یک عنوان دلخواه و نامک یکتا انتخاب کنید.';

        // dd($_REQUEST['language']);
        // Session::flash('language',$_REQUEST['language']);
        // Session::flash('parent',$_REQUEST['parent']);
        return view('admin.transitionkey.create', compact('pageTitle', 'breadcrumb', 'pageBc', 'pageSubtitle'));
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

        TransitionKey::create($data);
        \App\Libraries\Translation\Translation::clearCache();
        return redirect('admin/transitionkey')->with('flash_message', 'دسته بندی اضافه شد.');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $transitionkey = TransitionKey::findOrFail($id);

        $pageTitle = 'نمایش دسته';
        $breadcrumb = [route('category.index') => 'دسته بندی ها'];
        $pageBc = 'نمایش دسته';
        $pageSubtitle = '2نمایش دسته';

        return view('admin.transitionkey.show', compact('transitionkey', 'pageTitle', 'breadcrumb', 'pageBc', 'pageSubtitle'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $transitionkey = TransitionKey::findOrFail($id);
        $pageTitle = 'ویرایش دسته';
        $breadcrumb = [route('transitionkey.index') => 'دسته بندی ها'];
        $pageBc = 'ویرایش دسته';
        $pageSubtitle = '';

        return view('admin.transitionkey.edit', compact('transitionkey', 'pageTitle', 'breadcrumb', 'pageBc', 'pageSubtitle'));
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


        $transitionkey = TransitionKey::findOrFail($id);

        $transitionkey->update($data);
        \App\Libraries\Translation\Translation::clearCache();
        return redirect('admin/transitionkey')->with('flash_message', 'ویرایش انجام شد!');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        TransitionKey::destroy($id);
        \App\Libraries\Translation\Translation::clearCache();
        return redirect('admin/transitionkey')->with('flash_message', 'دسته بندی حذف شد!');
    }
}
