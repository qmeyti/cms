<?php

use App\Models\Menu;
use Illuminate\Support\Facades\DB;

class MenuController implements \App\Libraries\Template\TemplateControllerInterface
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return mixed|void
     */
    public function store(\Illuminate\Http\Request $request)
    {

        __sanitize('__footer_menu_title_1');

        __sanitize('__footer_menu_title_2');

        $data = $request->validate([
            '__main_menu' => 'required|integer|exists:menus,id',

            '__footer_menu_1' => 'required|integer|exists:menus,id',

            '__footer_menu_2' => 'required|integer|exists:menus,id',

            '__footer_menu_title_1' => 'required|string|min:1|max:255',

            '__footer_menu_title_2' => 'required|string|min:1|max:255',
        ]);

        DB::beginTransaction();
        try {

            __add_stg('__main_menu', $data['__main_menu'], 'int', 'home');

            __add_stg('__footer_menu_1', $data['__footer_menu_1'], 'int', 'home');

            __add_stg('__footer_menu_2', $data['__footer_menu_2'], 'int', 'home');

            __add_stg('__footer_menu_title_1', $data['__footer_menu_title_1'], 'string', 'home');

            __add_stg('__footer_menu_title_2', $data['__footer_menu_title_2'], 'string', 'home');

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
        $pageTitle = 'تنظیمات منوها';
        $breadcrumb = [];
        $pageBc = 'تنظیمات منوها';
        $pageSubtitle = '';

        return view('front.carly.setting.module_views.menu', compact('menus','pageTitle','breadcrumb','pageBc','pageSubtitle'));
    }
}
