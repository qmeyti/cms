<?php

use App\Models\Menu;
use Illuminate\Support\Facades\DB;

class BrandController implements \App\Libraries\Template\TemplateControllerInterface
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function store(\Illuminate\Http\Request $request)
    {

        $rules = [];

        for ($i = 1; $i <= 10; $i++)
            $rules['__brand_' . $i] = 'nullable|url|string|max:2000';

        $data = $request->validate($rules);

        DB::beginTransaction();
        try {

            for ($i = 1; $i <= 10; $i++) {
                if (!empty($data['__brand_' . $i])) {
                    __add_stg(('__brand_' . $i), $data['__brand_' . $i], 'text', 'home');
                } else {
                    \App\Models\Setting::removeItem('__brand_' . $i);
                }
            }

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
        $pageTitle = 'تنظیمات همکاران';
        $breadcrumb = [];
        $pageBc = 'تنظیمات همکاران';
        $pageSubtitle = '';
        return view('front.carly.setting.module_views.brand', [
            'pageTitle' => $pageTitle,
            'breadcrumb' => $breadcrumb,
            'pageBc' => $pageBc,
            'pageSubtitle' => $pageSubtitle,
        ]);
    }
}
