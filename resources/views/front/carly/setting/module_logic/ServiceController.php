<?php

use Illuminate\Support\Facades\DB;

class ServiceController implements \App\Libraries\Template\TemplateControllerInterface
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function store(\Illuminate\Http\Request $request)
    {

        __sanitize('__service_title_1');
        __sanitize('__service_title_2');
        __sanitize('__service_item_icon_1');
        __sanitize('__service_item_title_1');
        __sanitize('__service_item_body_1');
        __sanitize('__service_item_icon_2');
        __sanitize('__service_item_title_2');
        __sanitize('__service_item_body_2');
        __sanitize('__service_item_icon_3');
        __sanitize('__service_item_title_3');
        __sanitize('__service_item_body_3');
        __sanitize('__service_item_icon_4');
        __sanitize('__service_item_title_4');
        __sanitize('__service_item_body_4');

        $data = $request->validate([
            '__service_title_1' => 'required|string|max:255',
            '__service_title_2' => 'required|string|max:255',

            '__service_item_icon_1' => 'nullable|string|max:255',
            '__service_item_title_1' => 'nullable|string|max:255',
            '__service_item_body_1' => 'nullable|string|max:2000',

            '__service_item_icon_2' => 'nullable|string|max:255',
            '__service_item_title_2' => 'nullable|string|max:255',
            '__service_item_body_2' => 'nullable|string|max:2000',

            '__service_item_icon_3' => 'nullable|string|max:255',
            '__service_item_title_3' => 'nullable|string|max:255',
            '__service_item_body_3' => 'nullable|string|max:2000',

            '__service_item_icon_4' => 'nullable|string|max:255',
            '__service_item_title_4' => 'nullable|string|max:255',
            '__service_item_body_4' => 'nullable|string|max:2000',
        ]);

        DB::beginTransaction();
        try {

            __add_stg('__service_title_1', $data['__service_title_1'], 'string', 'home');
            __add_stg('__service_title_2', $data['__service_title_2'], 'string', 'home');

            __add_stg('__service_item_icon_1', $data['__service_item_icon_1'], 'string', 'home');
            __add_stg('__service_item_title_1', $data['__service_item_title_1'], 'string', 'home');
            __add_stg('__service_item_body_1', $data['__service_item_body_1'], 'text', 'home');

            __add_stg('__service_item_icon_2', $data['__service_item_icon_2'], 'string', 'home');
            __add_stg('__service_item_title_2', $data['__service_item_title_2'], 'string', 'home');
            __add_stg('__service_item_body_2', $data['__service_item_body_2'], 'text', 'home');

            __add_stg('__service_item_icon_3', $data['__service_item_icon_3'], 'string', 'home');
            __add_stg('__service_item_title_3', $data['__service_item_title_3'], 'string', 'home');
            __add_stg('__service_item_body_3', $data['__service_item_body_3'], 'text', 'home');

            __add_stg('__service_item_icon_4', $data['__service_item_icon_4'], 'string', 'home');
            __add_stg('__service_item_title_4', $data['__service_item_title_4'], 'string', 'home');
            __add_stg('__service_item_body_4', $data['__service_item_body_4'], 'text', 'home');

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
        $pageTitle = 'تنظیمات بخش  خدمات ما';
        $breadcrumb = [];
        $pageBc = 'تنظیمات خدمات ما';
        $pageSubtitle = '';

        return view('front.carly.setting.module_views.service',compact('pageTitle','breadcrumb','pageBc','pageSubtitle'));
    }
}
