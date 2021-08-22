<?php

use App\Models\Menu;
use Illuminate\Support\Facades\DB;

class HeaderController implements \App\Libraries\Template\TemplateControllerInterface
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return mixed|void
     */
    public function store(\Illuminate\Http\Request $request)
    {

        $data = $request->validate([
            '__main_menu' => 'required|integer|exists:menus,id',

            '__header_image_link' => 'required|string|url|max:2000',
        ]);

        DB::beginTransaction();
        try {

            __add_stg('__main_menu', $data['__main_menu'], 'int', 'home');

            __add_stg('__header_image_link', $data['__header_image_link'], 'text', 'home');

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

        return view('front.carly.setting.module_views.header', compact('menus'));
    }
}
