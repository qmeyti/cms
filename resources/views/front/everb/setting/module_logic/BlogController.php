<?php

use Illuminate\Support\Facades\DB;

class BlogController implements \App\Libraries\Template\TemplateControllerInterface
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function store(\Illuminate\Http\Request $request)
    {
        __sanitize('__blog_title_1');
        __sanitize('__blog_title_2');

        $data = $request->validate([

            '__blog_title_1' => 'required|string|min:3|max:255',

            '__blog_title_2' => 'required|string|min:3|max:255',

        ]);

        DB::beginTransaction();
        try {

            __add_stg('__blog_title_1', $data['__blog_title_1'], 'string', 'home');

            __add_stg('__blog_title_2', $data['__blog_title_2'], 'string', 'home');

            DB::commit();

        } catch (Exception $exception) {

            DB::rollBack();

            return redirect()->back()->with('flash_error', 'خطایی در حین ذخیره سازی رخ داده!');

        }

        return redirect()->back()->with('flash_message', 'تنظیمات با موفقیت ذخیره شد!');
    }

    /**
     * @return array
     */
    private function getLinkablePages()
    {
        $pages = \App\Models\Page::getLinkablePages();

        $items = [];
        foreach ($pages as $page) {
            $items[$page->id] =
                $page->title . ' [' . str_replace(['page', 'post'], ['صفحه', 'خبر'], $page->type) . "#{$page->id}" . ']';
        }

        return $items;
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|mixed
     */
    public function create(\Illuminate\Http\Request $request)
    {

        $pageTitle = 'تنظیمات بخش وبلاگ';
        $breadcrumb = [];
        $pageBc = 'تنظیمات وبلاگ';
        $pageSubtitle = '';

        return view('front.carly.setting.module_views.blog', [
            'pageTitle' => $pageTitle,
            'breadcrumb' => $breadcrumb,
            'pageBc' => $pageBc,
            'pageSubtitle' => $pageSubtitle,
            'pages' => $this->getLinkablePages()
        ]);
    }
}
