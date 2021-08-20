<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        $perPage = 25;

        if (!empty($keyword)) {
            $category = Category::where('title', 'LIKE', "%$keyword%")
                ->orWhere('slug', 'LIKE', "%$keyword%")
                ->orWhere('parent', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $category = Category::latest()->paginate($perPage);
        }

        return view('admin.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.category.create');
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

        $data = $this->validate($request, [
            'title' => 'required|string|max:100',
            'slug' => 'required|string|regex:!^[a-zA-Z0-9\-_\s]+$!|max:100|unique:categories,id',
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

        return view('admin.category.show', compact('category'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.category.edit', compact('category'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {

        $request->merge(['slug' => Str::slug((string)$request->input('slug'))]);

        __sanitize('title');

        $data = $this->validate($request, [
            'title' => 'required|string|max:100',
            'slug' => 'required|string|regex:!^[a-zA-Z0-9\-_\s]+$!|max:100|unique:categories,id,' . $id,
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
