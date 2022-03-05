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
            '__main_page_video_title' => 'required|string|min:3|max:255',
            '__main_page_video_link' => 'required|string|min:3|max:255',

            '__main_page_theory_title' => 'required|string|min:3|max:255',
            '__main_page_theory_description' => 'required|string|min:3|max:255',
            '__main_page_theory_main_image' => 'required|string|url|max:2000',
            '__main_page_theory_sing_image' => 'required|string|url|max:2000',
            '__main_page_theory_name' => 'required|string|min:3|max:255',
            '__main_page_theory_job' => 'required|string|min:3|max:255',

            '__main_page_about_us_shortـtitle' => 'required|string|min:3|max:255',
            '__main_page_about_us_mainـtitle' => 'required|string|min:3|max:255',
            '__main_page_about_us_image' => 'required|string|url|max:2000',
            '__main_page_about_us_description' => 'required|string|min:3|max:255',

            '__main_page_services_image' => 'required|string|url|max:2000',
            '__main_page_servicesـtitle' => 'required|string|min:3|max:255',
            '__main_page_servicesـfirst' => 'required|string|min:3|max:255',
            '__main_page_servicesـsecond' => 'required|string|min:3|max:255',
            '__main_page_servicesـthird' => 'required|string|min:3|max:255',

            
            '__main_page_team_shortـtitle' => 'required|string|min:3|max:255',
            '__main_page_teamـtitle' => 'required|string|min:3|max:255',
            '__main_page_team_image_first' => 'required|string|url|max:2000',
            '__main_page_teamـname_first' => 'required|string|min:3|max:255',
            '__main_page_team_job_first' => 'required|string|min:3|max:255',
            '__main_page_team_image_second' => 'required|string|url|max:2000',
            '__main_page_teamـname_second' => 'required|string|min:3|max:255',
            '__main_page_team_job_second' => 'required|string|min:3|max:255',
            '__main_page_team_image_third' => 'required|string|url|max:2000',
            '__main_page_teamـname_third' => 'required|string|min:3|max:255',
            '__main_page_team_job_third' => 'required|string|min:3|max:255',
            '__main_page_team_image_fourth' => 'required|string|url|max:2000',
            '__main_page_teamـname_fourth' => 'required|string|min:3|max:255',
            '__main_page_team_job_fourth' => 'required|string|min:3|max:255',
   




        ]);

        DB::beginTransaction();
        try {

            __add_stg('__main_page', $data['__main_page'], 'int', 'home');
            __add_stg('__main_page_image', $data['__main_page_image'], 'text', 'home');
            __add_stg('__main_page_video_page_link', $data['__main_page_video_page_link'], 'text', 'home');
            __add_stg('__main_page_video_title', $data['__main_page_video_title'], 'text', 'home');
            __add_stg('__main_page_video_link', $data['__main_page_video_link'], 'text', 'home');

            __add_stg('__main_page_theory_title', $data['__main_page_theory_title'], 'text', 'home');
            __add_stg('__main_page_theory_description', $data['__main_page_theory_description'], 'text', 'home');
            __add_stg('__main_page_theory_main_image', $data['__main_page_theory_main_image'], 'text', 'home');
            __add_stg('__main_page_theory_sing_image', $data['__main_page_theory_sing_image'], 'text', 'home');
            __add_stg('__main_page_theory_name', $data['__main_page_theory_name'], 'text', 'home');
            __add_stg('__main_page_theory_job', $data['__main_page_theory_job'], 'text', 'home');


            __add_stg('__main_page_about_us_shortـtitle', $data['__main_page_about_us_shortـtitle'], 'text', 'home');
            __add_stg('__main_page_about_us_mainـtitle', $data['__main_page_about_us_mainـtitle'], 'text', 'home');
            __add_stg('__main_page_about_us_image', $data['__main_page_about_us_image'], 'text', 'home');
            __add_stg('__main_page_about_us_description', $data['__main_page_about_us_description'], 'text', 'home');

            __add_stg('__main_page_services_image', $data['__main_page_services_image'], 'text', 'home');
            __add_stg('__main_page_servicesـtitle', $data['__main_page_servicesـtitle'], 'text', 'home');
            __add_stg('__main_page_servicesـfirst', $data['__main_page_servicesـfirst'], 'text', 'home');
            __add_stg('__main_page_servicesـsecond', $data['__main_page_servicesـsecond'], 'text', 'home');
            __add_stg('__main_page_servicesـthird', $data['__main_page_servicesـthird'], 'text', 'home');


            __add_stg('__main_page_team_shortـtitle', $data['__main_page_team_shortـtitle'], 'text', 'home');
            __add_stg('__main_page_teamـtitle', $data['__main_page_teamـtitle'], 'text', 'home');
            __add_stg('__main_page_team_image_first', $data['__main_page_team_image_first'], 'text', 'home');
            __add_stg('__main_page_teamـname_first', $data['__main_page_teamـname_first'], 'text', 'home');
            __add_stg('__main_page_team_job_first', $data['__main_page_team_job_first'], 'text', 'home');
            __add_stg('__main_page_team_image_second', $data['__main_page_team_image_second'], 'text', 'home');
            __add_stg('__main_page_teamـname_second', $data['__main_page_teamـname_second'], 'text', 'home');
            __add_stg('__main_page_team_job_second', $data['__main_page_team_job_second'], 'text', 'home');
            __add_stg('__main_page_team_image_third', $data['__main_page_team_image_third'], 'text', 'home');
            __add_stg('__main_page_teamـname_third', $data['__main_page_teamـname_third'], 'text', 'home');
            __add_stg('__main_page_team_job_third', $data['__main_page_team_job_third'], 'text', 'home');
            __add_stg('__main_page_team_image_fourth', $data['__main_page_team_image_fourth'], 'text', 'home');
            __add_stg('__main_page_teamـname_fourth', $data['__main_page_teamـname_fourth'], 'text', 'home');
            __add_stg('__main_page_team_job_fourth', $data['__main_page_team_job_fourth'], 'text', 'home');



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
