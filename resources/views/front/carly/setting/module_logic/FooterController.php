<?php

use App\Models\Menu;
use Illuminate\Support\Facades\DB;

class FooterController implements \App\Libraries\Template\TemplateControllerInterface
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function store(\Illuminate\Http\Request $request)
    {

        __sanitize('__footer_phone');
        __sanitize('__footer_location');

        $data = $request->validate([
            '__footer_menu' => 'required|integer|exists:menus,id',

            '__footer_menu_services' => 'required|integer|exists:menus,id',
            '__footer_menu_suitable' => 'required|integer|exists:menus,id',
            '__footer_menu_last' => 'required|integer|exists:menus,id',

            '__footer_logo' => 'nullable|string|url|max:2000',

            '__footer_phone' => 'nullable|string|min:3|max:255',
            '__footer_location' => 'nullable|string|min:3|max:1000',

            '__footer_facebook' => 'nullable|string|url|min:3|max:2000',
            '__footer_twitter' => 'nullable|string|url|min:3|max:2000',
            '__footer_whatsapp' => 'nullable|string|url|min:3|max:2000',
            '__footer_telegram' => 'nullable|string|url|min:3|max:2000',
            '__footer_instagram' => 'nullable|string|url|min:3|max:2000',
        ]);

        DB::beginTransaction();
        try {

            __add_stg('__footer_menu', $data['__footer_menu'], 'int', 'home');
            __add_stg('__footer_menu_services', $data['__footer_menu_services'], 'int', 'home');
            __add_stg('__footer_menu_suitable', $data['__footer_menu_suitable'], 'int', 'home');
            __add_stg('__footer_menu_last', $data['__footer_menu_last'], 'int', 'home');
            __add_stg('__footer_phone', $data['__footer_phone'], 'string', 'home');
            __add_stg('__footer_location', $data['__footer_location'], 'text', 'home');
            __add_stg('__footer_logo', $data['__footer_logo'], 'text', 'home');
            __add_stg('__footer_facebook', $data['__footer_facebook'], 'text', 'home');
            __add_stg('__footer_twitter', $data['__footer_twitter'], 'text', 'home');
            __add_stg('__footer_whatsapp', $data['__footer_whatsapp'], 'text', 'home');
            __add_stg('__footer_telegram', $data['__footer_telegram'], 'text', 'home');
            __add_stg('__footer_instagram', $data['__footer_instagram'], 'text', 'home');

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
        $pageTitle = 'تنظیمات بخش  پاصفحه';
        $breadcrumb = [];
        $pageBc = 'تنظیمات پاصفحه';
        $pageSubtitle = '';

        return view('front.carly.setting.module_views.footer', compact('menus','pageTitle','breadcrumb','pageBc','pageSubtitle'));
    }
}
