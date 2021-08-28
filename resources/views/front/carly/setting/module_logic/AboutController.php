<?php

use Illuminate\Support\Facades\DB;

class AboutController implements \App\Libraries\Template\TemplateControllerInterface
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function store(\Illuminate\Http\Request $request)
    {

        __sanitize('__about_button_text');

        __sanitize('__about_phone');

        __sanitize('__about_title');

        __sanitize('__about_list_title_1');

//        __sanitize('__about_list_items_1');

        __sanitize('__about_list_title_2');

//        __sanitize('__about_list_items_2');

        $data = $request->validate([

            '__about_page' => 'required|integer|exists:pages,id',

            '__about_image' => 'required|string|url|max:2000',

            '__about_phone' => 'required|string|min:3|max:255',

            '__about_button_text' => 'required|string|min:3|max:255',

            '__about_button_url' => 'required|string|url|min:3|max:2000',

            '__about_experience_days' => 'required|integer|max:9999999999',

            '__about_title' => 'required|string|min:1|max:255',

            '__about_list_title_1' => 'required|string|min:1|max:255',

            '__about_list_items_1' => 'required|string|min:1|max:10000',

            '__about_list_title_2' => 'required|string|min:1|max:255',

            '__about_list_items_2' => 'required|string|min:1|max:10000',

        ]);

        DB::beginTransaction();
        try {

            __add_stg('__about_page', $data['__about_page'], 'int', 'home');

            __add_stg('__about_image', $data['__about_image'], 'text', 'home');

            __add_stg('__about_phone', $data['__about_phone'], 'string', 'home');

            __add_stg('__about_title', $data['__about_title'], 'string', 'home');

            __add_stg('__about_button_text', $data['__about_button_text'], 'string', 'home');

            __add_stg('__about_list_title_1', $data['__about_list_title_1'], 'string', 'home');

            __add_stg('__about_list_title_2', $data['__about_list_title_2'], 'string', 'home');

            __add_stg('__about_button_url', $data['__about_button_url'], 'text', 'home');

            __add_stg('__about_list_items_1', $data['__about_list_items_1'], 'text', 'home');

            __add_stg('__about_list_items_2', $data['__about_list_items_2'], 'text', 'home');

            __add_stg('__about_experience_days', $data['__about_experience_days'], 'int', 'home');

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

        $pageTitle = 'تنظیمات بخش درباره ما';
        $breadcrumb = [];
        $pageBc = 'تنظیمات درباره ما';
        $pageSubtitle = '';

        return view('front.carly.setting.module_views.about', [
            'pageTitle' => $pageTitle,
            'breadcrumb' => $breadcrumb,
            'pageBc' => $pageBc,
            'pageSubtitle' => $pageSubtitle,
            'pages' => $this->getLinkablePages()
        ]);
    }
}
