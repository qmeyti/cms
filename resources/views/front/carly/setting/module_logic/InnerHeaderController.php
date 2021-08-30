<?php

use Illuminate\Support\Facades\DB;

class InnerHeaderController implements \App\Libraries\Template\TemplateControllerInterface
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function store(\Illuminate\Http\Request $request)
    {

        __sanitize('__inner_header_phone');
        __sanitize('__inner_header_email');
        __sanitize('__inner_header_location');
        __sanitize('__inner_header_social_icon_1');
        __sanitize('__inner_header_social_icon_2');
        __sanitize('__inner_header_social_icon_3');

        $data = $request->validate([

            '__inner_header_social_url_1' => 'sometimes|nullable|string|url|max:2000',
            '__inner_header_social_url_2' => 'sometimes|nullable|string|url|max:2000',
            '__inner_header_social_url_3' => 'sometimes|nullable|string|url|max:2000',
            '__inner_header_social_icon_1' => 'sometimes|nullable|string|min:3|max:255',
            '__inner_header_social_icon_2' => 'sometimes|nullable|string|min:3|max:255',
            '__inner_header_social_icon_3' => 'sometimes|nullable|string|min:3|max:255',

            '__inner_header_phone' => 'sometimes|nullable|string|min:3|max:30',
            '__inner_header_email' => 'sometimes|nullable|string|min:3|max:255',
            '__inner_header_location' => 'sometimes|nullable|string|min:3|max:1000',
            '__inner_header_contact_page' => 'sometimes|nullable|integer|exists:pages,id',

        ]);

        DB::beginTransaction();
        try {

            __add_stg('__inner_header_social_url_1', $data['__inner_header_social_url_1'], 'string', 'home');
            __add_stg('__inner_header_social_url_2', $data['__inner_header_social_url_2'], 'string', 'home');
            __add_stg('__inner_header_social_url_3', $data['__inner_header_social_url_3'], 'string', 'home');
            __add_stg('__inner_header_phone', $data['__inner_header_phone'], 'string', 'home');
            __add_stg('__inner_header_email', $data['__inner_header_email'], 'string', 'home');
            __add_stg('__inner_header_location', $data['__inner_header_location'], 'text', 'home');
            __add_stg('__inner_header_social_icon_1', $data['__inner_header_social_icon_1'], 'string', 'home');
            __add_stg('__inner_header_social_icon_2', $data['__inner_header_social_icon_2'], 'string', 'home');
            __add_stg('__inner_header_social_icon_3', $data['__inner_header_social_icon_3'], 'string', 'home');
            __add_stg('__inner_header_contact_page', $data['__inner_header_contact_page'], 'int', 'home');

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

        $pageTitle = 'تنظیمات سرصفحه داخلی';
        $breadcrumb = [];
        $pageBc = 'تنظیمات سرصفحه داخلی';
        $pageSubtitle = '';
        $pages = $this->getLinkablePages();

        return view('front.carly.setting.module_views.inner_header', compact('pages','pageTitle','breadcrumb','pageBc','pageSubtitle'));
    }
}
