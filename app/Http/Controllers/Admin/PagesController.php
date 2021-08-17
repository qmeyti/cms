<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');

        $perPage = 25;

        $pages = Page::with('categories')
            ->where('is_translation', false);

        if (!empty($keyword)) {

            $pages = $pages->where('title', 'LIKE', "%$keyword%")
                ->orWhere('content', 'LIKE', "%$keyword%")
                ->latest()
                ->paginate($perPage);

        } else {

            $pages = $pages->latest()->paginate($perPage);

        }

        return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        __sanitize('title');
        __sanitize('excerpt');
        __sanitize('meta_description');

        $request->merge(['slug' => Str::slug((string)$request->input('slug'))]);

        $data = $this->validate($request, [
            "title" => ["required", "min:2", "max:255", "string"],
            "status" => ["required", "string", "in:draft,published,pending"],
            "type" => ["required", "string", "in:post,page"],
            "slug" => ["required", "min:2", "max:255", "string"],
            "tags" => ["nullable", "sometimes", 'array'],
            "tags.*" => ["required", "min:1", "max:50", "string"],
            "categories" => ["nullable", "sometimes", 'array'],
            "categories.*" => ["required", 'exists:categories,id', "min:1", "integer"],
            "content" => ["nullable", "sometimes", "max:65535", "string"],
            "parent" => ["nullable", "sometimes", 'integer', 'min:1', 'exists:posts,id'],
            "feature_photo" => ['url', "nullable", "sometimes", 'max:2048', 'string'],
            "excerpt" => ["nullable", "sometimes", "max:300", "string"],
            "meta_description" => ["nullable", "sometimes", "max:200", "string"],
//            "post_id" => ['required', 'integer', 'min:1', 'exists:posts,id'],
        ],[],[
           'title' => 'عنوان نوشته',
           'status' => 'وضعیت انتشار',
           'type' => 'نوع نوشته',
           'slug' => 'عنوان انگلیسی نوشته',
           'tags' => 'برچسب ها',
           'categories' => 'دسته بندی ها',
           'content' => 'محتوای نوشته',
           'parent' => 'نوشته والد',
           'feature_photo' => 'تصویر شاخص',
           'excerpt' => 'خلاصه متن',
           'meta_description' => 'توضیحات متا',
           'post_id' => 'شناسه پست',
        ]);

        $data = $request->all();

        $data = htmlentities($data['body'], ENT_QUOTES, 'UTF-8', false);

        Page::create($data);

        return redirect('admin/pages')->with('flash_message', 'Page added!');
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
        $page = Page::with('categories')->findOrFail($id);

        return view('admin.pages.show', compact('page'));
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
        $page = Page::with('categories')->findOrFail($id);

        return view('admin.pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ]);
        $requestData = $request->all();

        $page = Page::findOrFail($id);
        $page->update($requestData);

        return redirect('admin/pages')->with('flash_message', 'Page updated!');
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
        Page::destroy($id);

        return redirect('admin/pages')->with('flash_message', 'Page deleted!');
    }
}
