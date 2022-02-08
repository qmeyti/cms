<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Favorite;
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

    public function index()
    {
//        dd('hi');

        $posts = Page::where('type','post')->where('status','published')->get();
        $lastposts = Page::where('type','post')->where('status','published')->latest()->take(3)->get();

        //        dd($posts);
        // dd($posts);
        return view('front.' . __stg('template') . '.blog' , compact('posts','lastposts'));

    }

    public function blog(Request $request, string $category = null)
    {
        $posts = Page::postsPublicConditions();

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
     * @param Request $request
     * @param string $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void
     */
    public function postSlug(Request $request, string $slug)
    {

        $slug = __sanitize_str(__urldecode($slug));

        if (is_null($post = Page::findBy('slug', $slug)))
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
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function postId(Request $request, int $id)
    {
        // dd('hi');
        if (is_null($post = Page::findBy('id', $id)))
            abort(404);

        if ($post->type === 'post')
            Statistic::viewPost($post->id);
        elseif ($post->type === 'page')
            Statistic::viewPage($post->id);

        $tags = Tag::getShuffleForPage($post->tags);

        // dd(Statistic::postViewCount($post->id));
        return view('front.' . __stg('template') . '.blog-details', [
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

        // return view('front.' . __stg('template') . '.blog-details');


    }

    /**
     * @param Request $request
     * @param string $tag
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function tagPosts(Request $request, string $tag)
    {
        $tag = __sanitize_str(__urldecode($tag));

        if (empty($tag))
            abort(404);

        $posts = Page::getByTag($tag, __stg('blog_elements_per_page', 10));

        /*Tags*/
        $tags = Tag::getRandomForPages($posts, __stg('__blog_tags_limit', 20));

        return view('front.' . __stg('template') . '.inner.pages.blog', [
            'posts' => $posts,
            'tags' => $tags,
            'pageTitle' => $tag,
            'pageKeywords' => implode(',', array_column($tags, 'tag')),
            'pageDescriptions' => $tag,
            'breadcrumb' => [
                'خانه' => route('front.home'),
                'بلاگ' => route('front.blog'),
                $tag => route('front.tag.posts', ['tag' => __urlencode($tag)]),
            ],
            'categories' => true,
        ]);

    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void
     */
    public function favoredPosts(Request $request)
    {
        if (auth()->check()) {

            $posts = Page::getFavored(__stg('blog_elements_per_page', 10));

            /*Tags*/
            $tags = Tag::getRandomForPages($posts, __stg('__blog_tags_limit', 20));

            return view('front.' . __stg('template') . '.inner.pages.blog', [
                'posts' => $posts,
                'tags' => $tags,
                'pageTitle' => 'نوشته های دنبال شده',
                'pageKeywords' => implode(',', array_column($tags, 'tag')),
                'pageDescriptions' => 'نوشته های دنبال شده',
                'breadcrumb' => [
                    'خانه' => route('front.home'),
                    'نوشته های دنبال شده' => route('front.favored.posts'),
                ],
                'categories' => true,
            ]);
        }

        abort(404);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void
     */
    public function likedPosts(Request $request)
    {
        if (auth()->check()) {

            $posts = Page::getLiked(__stg('blog_elements_per_page', 10));

            /*Tags*/
            $tags = Tag::getRandomForPages($posts, __stg('__blog_tags_limit', 20));

            return view('front.' . __stg('template') . '.inner.pages.blog', [
                'posts' => $posts,
                'tags' => $tags,
                'pageTitle' => 'لایک شده',
                'pageKeywords' => implode(',', array_column($tags, 'tag')),
                'pageDescriptions' => 'لایک شده',
                'breadcrumb' => [
                    'خانه' => route('front.home'),
                    'لایک شده' => route('front.favored.posts'),
                ],
                'categories' => true,
            ]);
        }

        abort(404);

    }


}
