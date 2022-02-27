<?php

use App\Models\Menu;
use Illuminate\Support\Facades\DB;

class HeaderController implements \App\Libraries\Template\TemplateControllerInterface
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function store(\Illuminate\Http\Request $request)
    {

        __sanitize('__header_phone');

        $data = $request->validate([
            '__main_menu' => 'required|integer|exists:menus,id',

            '__logo' => 'required|string|url|max:2000',

            '__header_phone' => 'required|string|min:3|max:255',
            '__header_email' => 'required|string|min:3|max:255',
            '__header_address' => 'required|string|min:3|max:255',


            '__header_facebok_link' => 'nullable|string|min:3|max:255',
            '__header_twitter_link' => 'nullable|string|min:3|max:255',
            '__header_linkedin_link' => 'nullable|string|min:3|max:255',
            '__header_instagram_link' => 'nullable|string|min:3|max:255',


        ]);

        DB::beginTransaction();
        try {


            __add_stg('__main_menu', $data['__main_menu'], 'int', 'home');
            __add_stg('__header_phone', $data['__header_phone'], 'string', 'home',1);
            __add_stg('__header_email', $data['__header_email'], 'string', 'home');
            __add_stg('__header_address', $data['__header_address'], 'string', 'home',1);
            // dd($data['__header_address']);
            __add_stg('__header_facebok_link', $data['__header_facebok_link'], 'text', 'home');
            __add_stg('__header_twitter_link', $data['__header_twitter_link'], 'text', 'home');
            __add_stg('__header_linkedin_link', $data['__header_linkedin_link'], 'text', 'home');
            __add_stg('__header_instagram_link', $data['__header_instagram_link'], 'text', 'home');

            __add_stg('__logo', $data['__logo'], 'text', 'home');

            DB::commit();

        } catch (Exception $exception) {

            DB::rollBack();

            return redirect()->back()->with('flash_error', 'خطایی در حین ذخیره سازی رخ داده!');

        }

        return redirect()->back()->with('flash_message', 'تنظیمات با موفقیت ذخیره شد!');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|mixed
     */
    public function create(\Illuminate\Http\Request $request)
    {
        /**
         * Get menus
         */
        $menus = Menu::all()->pluck('name', 'id');
        $pageTitle = 'تنظیمات بخش  سرصفحه';
        $breadcrumb = [];
        $pageBc = 'تنظیمات سرصفحه';
        $pageSubtitle = '';

        return view('front.everb.setting.module_views.header', compact('menus','pageTitle','breadcrumb','pageBc','pageSubtitle'));
    }
}
