<?php

namespace App\Http\Controllers\Admin;

use App\Models\Faq;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage =25 ;


        if (!empty($keyword)) {
            $faq = Faq::where('question', 'LIKE', "%$keyword%")
                ->where('language','fa')
                ->orWhere('answer', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $faq = Faq::latest()->where('language','fa')->paginate($perPage);
        }
        $languages = Language::all();
        $pageTitle = 'سوالات متداول';
        $breadcrumb = [];
        $pageBc = 'لیست سوالات متداول';
        $pageSubtitle = '';

        return view('admin.faqs.index', compact('faq', 'pageTitle', 'breadcrumb', 'pageBc', 'pageSubtitle','languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'ایجاد سوال جدید';
        $breadcrumb = [route('faq.index') => 'سوالات متداول'];
        $pageBc = 'دسته بندی جدید';
        $pageSubtitle = 'پرسش و پاسخ سوال جدید رو ایجاد کنید';

        return view('admin.faqs.create', compact('pageTitle', 'breadcrumb', 'pageBc', 'pageSubtitle'));    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        if(!isset($request->language)){

            $request['language'] = 'fa';

        }
        $data = $this->validate($request, [
            'question' => 'required|string|max:550',
            'answer' => 'required|string|max:3500',
            'language' => 'string',
            'parent' => 'sometimes|nullable|integer|exists:faqs,id',
        ]);

        Faq::create($data);

        return redirect('admin/faq')->with('flash_message', 'سوال جدید با موفقیت اضافه شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $faq = faq::findOrFail($id);

        $pageTitle = 'نمایش سوال';
        $breadcrumb = [route('faq.index') => 'سوالات متداول'];
        $pageBc = 'نمایش سوال';
        $pageSubtitle = $faq->title;

        return view('admin.faqs.show', compact('faq', 'pageTitle', 'breadcrumb', 'pageBc', 'pageSubtitle'));
    }
    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $faq = faq::findOrFail($id);
        $pageTitle = 'ویرایش سوال';
        $breadcrumb = [route('faq.index') => 'سوالات متداول'];
        $pageBc = 'ویرایش سوال';
        $pageSubtitle = '';

        return view('admin.faqs.edit', compact('faq', 'pageTitle', 'breadcrumb', 'pageBc', 'pageSubtitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//
//        dd($request->all());
//        dd();


        $data = $this->validate($request, [
            'question' => 'required|string|max:550',
            'answer' => 'required|string|max:3500',
        ]);
        $faq = faq::findOrFail($id);

        $faq->update($data);

        return redirect('admin/faq')->with('flash_message', 'ویرایش انجام شد!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Faq::destroy($id);

        return redirect('admin/faq')->with('flash_message', 'سوال  با موفقیت حذف شد');
    }
}
