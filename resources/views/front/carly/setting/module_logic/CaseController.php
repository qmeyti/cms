<?php

use Illuminate\Support\Facades\DB;

class CaseController implements \App\Libraries\Template\TemplateControllerInterface
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function store(\Illuminate\Http\Request $request)
    {

        __sanitize('__case_title_1');
        __sanitize('__case_title_2');

        $data = $request->validate([
            '__case_title_1' => 'required|string|max:255',
            '__case_title_2' => 'required|string|max:255',
            '__case_page_1' => 'nullable|integer|exists:pages,id',
            '__case_page_2' => 'nullable|integer|exists:pages,id',
            '__case_page_3' => 'nullable|integer|exists:pages,id',
            '__case_page_4' => 'nullable|integer|exists:pages,id',
            '__case_page_5' => 'nullable|integer|exists:pages,id',
            '__case_page_6' => 'nullable|integer|exists:pages,id',
            '__case_page_7' => 'nullable|integer|exists:pages,id',
            '__case_page_8' => 'nullable|integer|exists:pages,id',
        ]);

        DB::beginTransaction();
        try {
            __add_stg('__case_title_1', $data['__case_title_1'], 'string', 'home');

            __add_stg('__case_title_2', $data['__case_title_2'], 'string', 'home');

            __add_stg('__case_page_1', $data['__case_page_1'], 'int', 'home');

            __add_stg('__case_page_2', $data['__case_page_2'], 'int', 'home');

            __add_stg('__case_page_3', $data['__case_page_3'], 'int', 'home');

            __add_stg('__case_page_4', $data['__case_page_4'], 'int', 'home');

            __add_stg('__case_page_5', $data['__case_page_5'], 'int', 'home');

            __add_stg('__case_page_6', $data['__case_page_6'], 'int', 'home');

            __add_stg('__case_page_7', $data['__case_page_7'], 'int', 'home');

            __add_stg('__case_page_8', $data['__case_page_8'], 'int', 'home');

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
        return view('front.carly.setting.module_views.case', ['pages' => $this->getLinkablePages()]);
    }
}
