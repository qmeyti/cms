<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Libraries\GeneralRegex;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = __stg('element_per_page', 25);

        if (!empty($keyword)) {
            $tags = Tag::where('name', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $tags = Tag::latest()->paginate($perPage);
        }

        $pageTitle = 'لیست برچسب ها';
        $breadcrumb = [];
        $pageBc = 'برچسب ها';
        $pageSubtitle = '';

        return view('admin.tags.index', compact('tags', 'pageTitle', 'breadcrumb', 'pageBc', 'pageSubtitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $pageTitle = 'ایجاد برچسب جدید';
        $breadcrumb = [route('tags.index') => 'برچسب ها'];
        $pageBc = 'ایجاد برچسب';
        $pageSubtitle = '';

        return view('admin.tags.create', compact('pageTitle', 'breadcrumb', 'pageBc', 'pageSubtitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        __sanitize('name', '');

        $data = $request->validate([
            'name' => ['required', 'unique:tags,name', 'string', 'max:255', 'regex:' . GeneralRegex::tagsRegex()]
        ], [], ['name' => 'عنوان برچسب']);

        Tag::create($data);

        return redirect('admin/tags')->with('flash_message', 'برچسب با موفقیت ایجاد شد!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $tag = Tag::findOrFail($id);

        $pageTitle = 'نمایش برچسب';
        $breadcrumb = [route('tags.index') => 'برچسب ها'];
        $pageBc = 'نمایش برچسب';
        $pageSubtitle = $tag->name;

        return view('admin.tags.show', compact('tag' ,'pageTitle','breadcrumb', 'pageBc', 'pageSubtitle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $tag = Tag::findOrFail($id);

        $pageTitle = 'ویرایش برچسب';
        $breadcrumb = [route('tags.index') => 'برچسب ها'];
        $pageBc = 'ویرایش برچسب';
        $pageSubtitle = $tag->name;

        return view('admin.tags.edit', compact('tag', 'pageTitle','breadcrumb', 'pageBc', 'pageSubtitle'));
    }

    /**
     * @param Request $request
     * @param Tag $tag
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Tag $tag)
    {
        __sanitize('name', '');

        $data = $request->validate([
            'name' => ['required', 'unique:tags,name,' . $tag->id, 'string', 'max:255', 'regex:' . GeneralRegex::tagsRegex()]
        ], [], ['name' => 'عنوان برچسب']);

        $tag->update($data);

        return redirect('admin/tags')->with('flash_message', 'ویرایش برچسب با موفقیت انجام شد!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Tag::destroy($id);

        return redirect('admin/tags')->with('flash_message', 'برچسب حذف شد!');
    }
}
