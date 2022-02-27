<?php

use Illuminate\Support\Facades\DB;

class SliderController implements \App\Libraries\Template\TemplateControllerInterface
{

    public function store(\Illuminate\Http\Request $request)
    {

        $data = $request->validate([
            '__main_page' => 'required|integer|exists:pages,id',
            '__main_page_image' => 'required|string|url|max:2000',
            '__main_page_video_page_link' => 'required|string|min:3|max:255',

        ]);

        DB::beginTransaction();
        try {

            __add_stg('__main_page', $data['__main_page'], 'int', 'home');
            __add_stg('__main_page_image', $data['__main_page_image'], 'text', 'home');
            __add_stg('__main_page_video_page_link', $data['__main_page_video_page_link'], 'text', 'home');

            DB::commit();
        } catch (Exception $exception) {

            DB::rollBack();

            return redirect()->back()->with('flash_error', 'خطایی در حین ذخیره سازی رخ داده!');

        }

        return redirect()->back()->with('flash_message', 'تنظیمات با موفقیت ذخیره شد!');
    }


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


    public function create(\Illuminate\Http\Request $request)
    {
        $pageTitle = 'صحفه ی اصلی';
        $breadcrumb = [];
        $pageBc = 'صحفه ی اصلی';
        $pageSubtitle = '';

        return view('front.everb.setting.module_views.slider', [
            'pageTitle' => $pageTitle,
            'breadcrumb' => $breadcrumb,
            'pageBc' => $pageBc,
            'pageSubtitle' => $pageSubtitle,
            'pages' => $this->getLinkablePages()
        ]);
    }

}
