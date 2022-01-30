<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class TransitionController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        $pageTitle = 'ایجاد دسته بندی جدید';
        $breadcrumb = [route('transitions.index') => 'ترجمه ها'];
        $pageBc = 'دسته بندی جدید';
        $pageSubtitle = 'برای ایجاد دسته جدید، یک عنوان دلخواه و نامک یکتا انتخاب کنید.';

        return view('admin.transitions.create', compact('pageTitle', 'breadcrumb', 'pageBc', 'pageSubtitle'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'key_id' => 'required|integer|exists:transition_key,id',
            'transition' => 'required|string',
            'language' => 'required|string|exists:languages,code',

        ]);

        Transition::create($data);
        
        
        // Cache::remember('translations', 60*60*24, function() {
        //     return DB::table('transitions')->get();
        // });
        \App\Libraries\Translation\Translation::clearCache();

        return redirect('admin/transitionkey')->with('flash_message', 'ترجمه جدید اضافه شد');
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
        $transition = Transition::findOrFail($id);
        $pageTitle = 'ویرایش دسته';
        $breadcrumb = [route('transitionkey.index') => 'دسته بندی ها'];
        $pageBc = 'ویرایش دسته';
        $pageSubtitle = '';

        return view('admin.transitions.edit', compact('transition', 'pageTitle', 'breadcrumb', 'pageBc', 'pageSubtitle'));
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
            'transition' => 'required|string',
            ]);


        $transition = Transition::findOrFail($id);

        $transition->update($data);
        \App\Libraries\Translation\Translation::clearCache();
        return redirect('admin/transitionkey')->with('flash_message', 'ویرایش انجام شد!');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Transition::destroy($id);
        \App\Libraries\Translation\Translation::clearCache();
        return redirect('admin/transitionkey')->with('flash_message', 'دسته بندی حذف شد!');
    }
}
