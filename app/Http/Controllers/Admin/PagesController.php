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

        $perPage = __stg('element_per_page', 25);

        $pages = Page::with('categories')
            ->whereIn('status', ['published', 'pending', 'trash'])
            ->where('is_translation', false);

        if (!empty($keyword)) {

            $pages = $pages->where('title', 'LIKE', "%$keyword%")
                ->orWhere('content', 'LIKE', "%$keyword%")
                ->latest()
                ->paginate($perPage);

        } else {

            $pages = $pages->latest()->paginate($perPage);

        }

        $pageTitle = 'لیست نوشته ها';
        $breadcrumb = [];
        $pageBc = 'نوشته ها';
        $pageSubtitle = 'در این قسمت لیست همه مقالات و اخبار سایت را مشاهده میکنید.';

        return view('admin.pages.index', compact('pages', 'pageTitle', 'breadcrumb', 'pageBc', 'pageSubtitle'));
    }

    /**
     * @param array $notInIds
     * @return array
     */
    private function parentablePages(array $notInIds)
    {
        $ps = [];

        foreach (Page::getParentablePage($notInIds) as $item) {
            $ps[$item->id] = $item->title;
        }

        return $ps;
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
            'parents' => $this->parentablePages([$page->id]),
            'multipleCategorySelection' => true,
        ]);
    }

    /**
     * @param $tagsString
     * @return array|false|string[]
     */
    private function tagsParser($tagsString)
    {
        if (is_string($tagsString)) {
            $tagsList = explode(',', $tagsString);

            array_map(function ($item) {

                return preg_replace('!\s+!', ' ', trim($item));

            }, $tagsList);

            return $tagsList;
        }

        return [];
    }

    /**
     * Insert new tags
     *
     * @param Page $page
     * @param string $tags
     */
    private function insertTags(Page $page, string $tags)
    {
        if (!empty($tags = $this->tagsParser($tags))) {

            if (!empty($tags = Tag::savePostTags($tags))) {

                $page->tags()->sync(array_values($tags));

            }

        }
    }

    private function insertCategories(Page $page, array $cats)
    {
        if (!empty($cats))
            $page->categories()->sync(array_values($cats));
    }

    /**
     * @param PageRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(PageRequest $request)
    {
        $request->validate(["slug" => ['unique:pages,slug']]);

        $data = $request->validated();

        $data['content'] = htmlentities($data['content'], ENT_QUOTES, 'UTF-8', false);

        DB::beginTransaction();

        try {

            /**
             * Get Article
             */
            $page = __null404(Page::find($data['page_id']));

            /**
             * Insert new tags
             */
            $this->insertTags($page, (isset($data['tags']) ? $data['tags'] : ''));

            /**
             * Post type settings
             */
            if ($data['type'] === 'post') {
                /**
                 * Parent page set null
                 */
                $data['parent'] = null;

                /**
                 * Insert categories
                 */
                if (isset($data['categories'])) {
                    $this->insertCategories($page, $data['categories']);
                }

            } else {

                if (isset($data['parent']) && $page->id == $data['parent']) {
                    return back()->with('flash_error', 'صفحه والد انتخاب شده صحیح نیست!');
                }

            }

            $page->update($data);

            DB::commit();

        } catch (\Exception $exception) {

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

        return view('admin.pages.edit', [
            'page' => $page,
            'parents' => $this->parentablePages([$page->id]),
            'tags' => $page->tags->pluck('name')->toArray(),
        ]);
    }

    /**
     * @param PageRequest $request
     * @param Page $page
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(PageRequest $request, Page $page)
    {
        $request->validate(["slug" => ['unique:pages,slug,' . $page->id]]);

        $data = $request->validated();

        $data['content'] = htmlentities($data['content'], ENT_QUOTES, 'UTF-8', false);

        DB::beginTransaction();

        try {

            /**
             * Insert new tags
             */
            $this->insertTags($page, (isset($data['tags']) ? $data['tags'] : ''));

            /**
             * Post type settings
             */
            if ($data['type'] === 'post') {
                /**
                 * Parent page set null
                 */
                $data['parent'] = null;

                /**
                 * Insert categories
                 */
                if (isset($data['categories'])) {
                    $this->insertCategories($page, $data['categories']);
                }

            } else {

                if (isset($data['parent']) && $page->id == $data['parent']) {
                    return back()->with('flash_error', 'صفحه والد انتخاب شده صحیح نیست!');
                }

                $page->categories()->sync([]);

            }

            $page->update($data);

            DB::commit();

        } catch (\Exception $exception) {

            DB::rollBack();

            return back()->with('flash_error', 'خطایی در هنگام ذخیره سازی رخ داده است!');
        }

        return redirect('admin/pages')->with('flash_message', 'نوشته با موفقیت ویرایش شد!');

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
