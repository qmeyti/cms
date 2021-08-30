<?php

use App\Models\Menu;
use Illuminate\Support\Facades\DB;

class InnerHeaderController implements \App\Libraries\Template\TemplateControllerInterface
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function store(\Illuminate\Http\Request $request)
    {

        __sanitize('__header_phone');

        $data = $request->validate([

            '__logo' => 'required|string|url|max:2000',

            '__header_phone' => 'required|string|min:3|max:255',
        ]);

        DB::beginTransaction();
        try {

            __add_stg('__header_phone', $data['__header_phone'], 'string', 'home');

            __add_stg('__logo', $data['__logo'], 'text', 'home');

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
