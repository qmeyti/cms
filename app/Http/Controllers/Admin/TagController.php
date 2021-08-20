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
        $perPage = 25;

        if (!empty($keyword)) {
            $tags = Tag::where('name', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $tags = Tag::latest()->paginate($perPage);
        }

        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.tags.create');
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

        return view('admin.tags.show', compact('tag'));
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

        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
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
