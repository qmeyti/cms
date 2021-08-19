<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PageRequest as PageRequest;
use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function create()
    {
        /**
         * Delete all old Auto-draft posts
         */
        $page = null;

        DB::beginTransaction();

        try {

            Page::deleteAutoDrafts();

            $page = Page::makeAutoDraft();

            DB::commit();

        } catch (\Exception $exception) {

            DB::rollBack();

            return redirect('admin/pages')->with('flash_error', 'خطایی در هنگام ایجاد فرم رخ داد!');

        }

        return view('admin.pages.create', [
            'page' => $page,
            'categories' => [],
            'tags' => [],
            'multipleCategorySelection' => true,
        ]);
    }

    /**
     * @param PageRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(PageRequest $request)
    {
        $data = $request->validated();

        $data['content'] = htmlentities($data['content'], ENT_QUOTES, 'UTF-8', false);

        DB::beginTransaction();

        try {

            $page = __null404(Page::find($data['page_id']));

            /**
             * Insert new tags
             */
            if (isset($data['tags']) && !empty($data['tags']))
            {
                /**
                 * Insert new tags and get all selected tags ids for store
                 */
                $tags = Tag::savePostTags($data['tags']);

                /**
                 * Insert new tags
                 */
                if (!empty($tags))
                    $page->tags()->sync(array_values($tags));

            }

            if ($data['type'] === 'post') {
                /**
                 * Unset parent page if is post
                 */
                if (isset($data['parent']))
                    unset($data['parent']);

                /**
                 * Insert categories
                 */
                if (isset($data['categories']) && !empty($data['categories']))
                    $page->categories()->sync(array_values($data['categories']));
            }

            $page->update($data);

            DB::commit();

        } catch (\Exception $exception) {

            dd($exception->getMessage());

            DB::rollBack();

            return back()->with('flash_error', 'خطایی در هنگام ذخیره سازی رخ داده است!');
        }

        return redirect('admin/pages')->with('flash_message', 'نوشته جدید با موفقیت ایجاد شد!');

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
