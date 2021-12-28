<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 15;

        if (!empty($keyword)) {
            $languages = Language::where('code', 'LIKE', "%$keyword%")->orWhere('label', 'LIKE', "%$keyword%")
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'ایجاد زبان جدید';
        $pageBc = 'ایجاد زبان';
        $pageSubtitle = '';

        return view('admin.languages.create',compact('pageTitle', 'pageBc', 'pageSubtitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'code' => 'required|string|max:10|min:1',
            'language_name' => 'required|string|max:20|min:1',

        ]);

       Language::create($data);

       return redirect('admin/languages')->with('flash_message', 'زبان جدید ایجاد شد');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $language = Language::findOrFail($id);
        $pageTitle = 'مشاهده زبان';
        $pageBc = 'زبان';
        $pageSubtitle = '';
        return view('admin.languages.show', compact('language', 'pageTitle', 'pageBc', 'pageSubtitle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $language = Language::findOrFail($id);
        $pageTitle = 'ویرایش زبان';
        $breadcrumb = [route('languages.index') => 'لیست زبان ها'];
        $pageBc = 'ویرایش زبان';
        $pageSubtitle = '';
        return view('admin.languages.edit', compact('language', 'pageTitle', 'breadcrumb', 'pageBc', 'pageSubtitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Language $language)
    {
        $data = $request->validate([
            'code' => 'required|string|max:10|min:1',
            'language_name' => 'required|string|max:20|min:1',

        ], [], [
            'code' => 'کد',
            'language_name' => 'نام زبان',
        ]);

        $language->update($data);


        return redirect('admin/languages')->with('flash_message', 'زبان با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Language::destroy($id);

        return redirect('admin/languages')->with('flash_message', 'زبان حذف شد!');
    }

    public function switch($lang)
    {
        $langeuge = DB::table('languages')->where('code', $lang)->first();
       
        if($langeuge){

            Session::put('locale',$lang);
            Session::save();
            return redirect()->back();

        }
        Session::put('locale',config('app.locale'));
        Session::save();
        return redirect()->back();
        
    }
}
