<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Page;
use App\Models\Statistic;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Load blog archive
     *
     * @param Request $request
     * @param string|null $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function blog(Request $request, string $category = null)
    {
        $posts = Page::with('tags', 'categories', 'writer')
            ->withCount('comments')
            ->where('type', 'post')
            ->where('is_translation', 0)
            ->where('status', 'published');

        /**
         * Find by category
         */
        if (!is_null($category)) {
            /**
             * Check category is numeric and get the posts has that id
             */
            if (preg_match('#^[0-9]+$#', $category)) {

                $category = Category::find(intval($category));

                if (is_null($category))
                    abort(404);

                $posts = $posts->whereHas('categories', function ($q) use ($category) {
                    $q->where('categories.id', $category->id);
                });

            } /**
             * Get category slug and find posts
             */ else {
                /**
                 * Convert category slug in url to normal text
                 */
                $category = __sanitize_str(utf8_decode(urldecode($category)));

                $category = Category::where('slug', $category)->first();

                if (is_null($category))
                    abort(404);

                $posts = $posts->whereHas('categories', function ($q) use ($category) {
                    $q->where('categories.slug', $category->slug);
                });

            }

        }

        $posts = $posts->orderBy('pages.id', 'DESC');

        /**
         * Search in blog
         */
        if ($request->has('q')) {

            __sanitize('q');

            $question = ($request->validate(['q' => 'nullable|string|max:255']))['q'];

            if (!empty($question)) {

                $posts = $posts->where('title', 'LIKE', "%$question%")
                    ->orWhere('slug', 'LIKE', "%$question%")
                    ->orWhere('content', 'LIKE', "%$question%");

                $posts = $posts->paginate(__stg('blog_elements_per_page', 10));
            }

            $posts->appends(['q' => $question]);

        } /**
         * Load all posts
         */
        else {

            $posts = $posts->paginate(__stg('blog_elements_per_page', 10));

        }

        /**
         * Add page number to paginator links
         */
        $posts->appends($request->except('page'));

        /**
         * Get archive Tags
         */
        $tags = Tag::getPopularForPage($posts, __stg('__blog_tags_limit', 20));

        return view('front.' . __stg('template') . '.inner.pages.blog',
            [
                'breadcrumb' => [
                    'خانه' => route('front.home'),
                    'بلاگ' => '',
                ],
                'categories' => true,
                'posts' => $posts,
                'tags' => $tags,
                'pageTitle' => is_null($category) ? 'بلاگ' : $category->title,
                'pageKeywords' => implode(',', array_column($tags, 'tag')),
                'pageDescriptions' => is_null($category) ? null : $category->description,
            ]);
    }

    /**
     * Get a post by id
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function postId(Request $request, $id)
    {
        $post = Page::with([
            'tags',
            'categories',
            'user',
            'user_comments.user',
            'user_comments' => function ($q) {
                $q->where('status', 'publish');
            }])
            ->withCount('comments')
            ->where('id', intval($id))
            ->first();

        if ($post == null)
            abort(404);

        if ((auth()->check() && Page::userCanAccess(auth()->user(), $post, 'read')) || (!auth()->check() && $post->status === 'publish' && Permit::groupHasPermission(6, ['read']))) {

            if ($post->type === 'post')
                Statistic::viewPost($post->id);
            elseif ($post->type === 'page')
                Statistic::viewPage($post->id);

            $tags = Tag::postGetRandomTags($post->tags);

            return view('front_end.' . get_option('front_template_name') . '.pages.blog.single',
                [
                    'categories' => '',
                    'views' => Statistic::postViewCount($post->id),
                    'post' => $post,
                    'tags' => $tags,
                    'page_title' => $post->title,
                    'page_keywords' => $post->meta_keywords,
                    'page_descriptions' => $post->meta_description,
                ]);
        }

        abort(404);
    }

    /**
     * @param Request $request
     * @param string $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void
     */
    public function postSlug(Request $request, string $slug)
    {

        $slug = __sanitize_str(__urldecode($slug));

        $post = Page::with(['tags', 'categories', 'writer', 'comments', 'comments' => function ($q) {
            $q->where('status', 'publish');
        }])
            ->withCount('comments')
            ->where('slug', $slug)
            ->where('is_translation', 0)
            ->where('status', 'published')
            ->first();

        if ($post == null)
            abort(404);

        if ($post->type === 'post')
            Statistic::viewPost($post->id);
        elseif ($post->type === 'page')
            Statistic::viewPage($post->id);

        $tags = Tag::getShuffleForPage($post->tags);


        return view('front.' . __stg('template') . '.inner.pages.single', [
            'next' => Page::theNearPage($post),
            'prev' => Page::theNearPage($post, false),
            'pageTitle' => $post->title,
            'breadcrumb' => [
                'خانه' => route('front.home'),
                'بلاگ' => route('front.blog'),
                Str::limit($post->title, 50) => '',
            ],
            'categories' => '',
            'views' => Statistic::postViewCount($post->id),
            'post' => $post,
            'tags' => $tags,
            'pageKeywords' => $post->meta_keywords,
            'pageDescriptions' => $post->meta_description,
        ]);

    }

    /**
     * @param Request $request
     * @param string $tag
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Validation\ValidationException
     */
    public function tag_posts(Request $request, string $tag)
    {
        $tag = urldecode($tag);

        $v = Validator::make(['tag' => $tag], [
            'tag' => 'required|string|max:60|min:1'
        ]);

        if ($v->fails()) {
            abort(404);
        }

        $posts = Page::with('tags', 'categories', 'user')
            ->withCount('comments')
            ->whereHas('tags', function ($q) use ($tag) {
                $q->where('tag', entity_strip($tag));
            })->where('type', 'post');

        $privateRead = ['read_private_posts', 'delete_private_pages', 'edit_private_pages'];

        if ((auth()->check() && only($privateRead)) || (Permit::groupHasPermission('6', $privateRead))) {
            $posts = $posts->whereIn('posts.status', ['publish', 'private']);
        } else {
            $posts = $posts->where('posts.status', 'publish');
        }

        $posts = $posts->orderBy('posts.id', 'DESC')
            ->paginate(get_option('elements_per_page'));

        /*Tags*/
        $tags = $this->postsGetRandomTags($posts, get_option('tags_limit', 20));

        return view('front_end.' . get_option('front_template_name') . '.pages.blog.archive', [
            'posts' => $posts,
            'tags' => $tags,
            'page_title' => $tag,
            'page_keywords' => implode(',', array_column($tags, 'tag')),
            'page_descriptions' => $tag,
        ]);

    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void
     */
    public function favorite_posts(Request $request)
    {
        if (auth()->check()) {

            $posts = Page::with('tags', 'categories', 'user')
                ->withCount('comments')
                ->where('type', 'post');

            $privateRead = ['read_private_posts', 'delete_private_pages', 'edit_private_pages'];
            if ((auth()->check() && only($privateRead)) || (Permit::groupHasPermission('6', $privateRead))) {
                $posts = $posts->whereIn('posts.status', ['publish', 'private']);
            } else {
                $posts = $posts->where('posts.status', 'publish');
            }

            $posts = $posts->whereIn('posts.id', Favorite::where('user_id', auth()->id())
                ->pluck('post_id'))
                ->orderBy('posts.id', 'DESC')
                ->paginate(get_option('elements_per_page'));

            /*Tags*/
            $tags = $this->postsGetRandomTags($posts, get_option('tags_limit', 20));

            return view('front_end.' . get_option('front_template_name') . '.pages.blog.archive',
                [
                    'posts' => $posts,
                    'tags' => $tags,
                    'page_title' => __('lang.favorites'),
                    'page_keywords' => implode(',', array_column($tags, 'tag')),
                    'page_descriptions' => __('lang.favorites'),
                ]);
        }
        abort(404);
    }


}
