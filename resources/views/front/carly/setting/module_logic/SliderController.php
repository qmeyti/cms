<?php

use Illuminate\Support\Facades\DB;

class SliderController implements \App\Libraries\Template\TemplateControllerInterface
{

    public function store(\Illuminate\Http\Request $request)
    {

        $data = $request->validate([
            '__main_slider' => 'required|integer|exists:sliders,id',

        ]);

        DB::beginTransaction();
        try {

            __add_stg('__main_slider', $data['__main_slider'], 'int', 'home');

            DB::commit();
        } catch (Exception $exception) {

            DB::rollBack();

            return redirect()->back()->with('flash_error', 'خطایی در حین ذخیره سازی رخ داده!');

        }

        return redirect()->back()->with('flash_message', 'تنظیمات با موفقیت ذخیره شد!');
    }

    public function create(\Illuminate\Http\Request $request)
    {
        $sliders = \App\Models\Slider::all()->pluck('title' ,'id');

        return view('front.carly.setting.module_views.slider', compact('sliders'));
    }
}
