<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        // $perPage = __stg('element_per_page', 25);
        $perPage =25 ;


        if (!empty($keyword)) {
            $category = Category::where('title', 'LIKE', "%$keyword%")
                ->where('language','fa')
                ->orWhere('slug', 'LIKE', "%$keyword%")
                ->orWhere('parent', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $category = Category::latest()->where('language','fa')->paginate($perPage);
        }
        $languages = Language::all();
        $pageTitle = 'دسته بندی ها';
        $breadcrumb = [];
        $pageBc = 'لیست دسته بندی ها';
        $pageSubtitle = '';

        return view('admin.category.index', compact('category', 'pageTitle', 'breadcrumb', 'pageBc', 'pageSubtitle','languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $pageTitle = 'ایجاد دسته بندی جدید';
        $breadcrumb = [route('category.index') => 'دسته بندی ها'];
        $pageBc = 'دسته بندی جدید';
        $pageSubtitle = 'برای ایجاد دسته جدید، یک عنوان دلخواه و نامک یکتا انتخاب کنید.';

        // dd($_REQUEST['language']);
        // Session::flash('language',$_REQUEST['language']);
        // Session::flash('parent',$_REQUEST['parent']);
        return view('admin.category.create', compact('pageTitle', 'breadcrumb', 'pageBc', 'pageSubtitle'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->merge(['slug' => Str::slug((string)$request->input('slug'))]);

        __sanitize('title');

        if($request->parent_translition){
          $myCategory = Category::find($request->parent_translition);
//            $myCategory2 = Category::find($myCategory->parent);
            $request['slug']=null;
            //  $request['parent']=$myCategory2->parentTranslition->id??null;
            $request['parent']=null;
        }

//        $request['language']=__lng();
//         dd($request->all());
        // dd(Session::get('language'));
        $data = $this->validate($request, [
            'title' => 'required|string|max:100',
            'slug' => 'sometimes|nullable|regex:!^[a-zA-Z]{1}[a-zA-Z0-9\-_\s]+$!|max:100|unique:categories,id',
            'language' => 'string',
            'parent_translition' => 'sometimes|nullable|integer|exists:categories,id',
            'parent' => 'sometimes|nullable|integer|exists:categories,id',
        ]);

        Category::create($data);

        return redirect('admin/category')->with('flash_message', 'دسته بندی اضافه شد.');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);

        $pageTitle = 'نمایش دسته';
        $breadcrumb = [route('category.index') => 'دسته بندی ها'];
        $pageBc = 'نمایش دسته';
        $pageSubtitle = $category->title;

        return view('admin.category.show', compact('category', 'pageTitle', 'breadcrumb', 'pageBc', 'pageSubtitle'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $pageTitle = 'ویرایش دسته';
        $breadcrumb = [route('category.index') => 'دسته بندی ها'];
        $pageBc = 'ویرایش دسته';
        $pageSubtitle = '';

        return view('admin.category.edit', compact('category', 'pageTitle', 'breadcrumb', 'pageBc', 'pageSubtitle'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
//
//        dd($request->all());
//        dd();

        $request->merge(['slug' => Str::slug((string)$request->input('slug'))]);

        __sanitize('title');

        $data = $this->validate($request, [
            'title' => 'required|string|max:100',
            'slug' => 'sometimes|nullable|regex:!^[a-zA-Z]{1}[a-zA-Z0-9\-_\s]+$!|max:100|unique:categories,id,' . $id,
            'parent' => 'sometimes|nullable|integer|exists:categories,id',
        ]);

        if ($request->has('parent') && empty($data['parent'])) {
            unset($data['parent']);
        }

        $category = Category::findOrFail($id);

        $category->update($data);

        return redirect('admin/category')->with('flash_message', 'ویرایش انجام شد!');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Category::destroy($id);

        return redirect('admin/category')->with('flash_message', 'دسته بندی حذف شد!');
    }
}
