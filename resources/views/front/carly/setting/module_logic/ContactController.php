<?php

use Illuminate\Support\Facades\DB;

class ContactController implements \App\Libraries\Template\TemplateControllerInterface
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function store(\Illuminate\Http\Request $request)
    {

        __sanitize('__contact_us_title_1');
        __sanitize('__contact_us_title_2');
        __sanitize('__contact_us_address_title_1');
        __sanitize('__contact_us_address_icon_1');
        __sanitize('__contact_us_address_line_1_1');
        __sanitize('__contact_us_address_line_2_1');
        __sanitize('__contact_us_address_line_1_data_1');
        __sanitize('__contact_us_address_line_2_data_1');
        __sanitize('__contact_us_address_title_2');
        __sanitize('__contact_us_address_icon_2');
        __sanitize('__contact_us_address_line_1_2');
        __sanitize('__contact_us_address_line_2_2');
        __sanitize('__contact_us_address_line_1_data_2');
        __sanitize('__contact_us_address_line_2_data_2');
        __sanitize('__contact_us_form_text');

        $data = $request->validate([
            '__contact_us_form_text' => 'required|string|max:1000',
            '__contact_us_title_1' => 'required|string|max:255',
            '__contact_us_title_2' => 'required|string|max:255',
            '__contact_us_address_title_1' => 'required|string|max:255',
            '__contact_us_address_icon_1' => 'required|string|max:255',
            '__contact_us_address_line_1_1' => 'required|string|max:255',
            '__contact_us_address_line_1_data_1' => 'required|string|max:255',
            '__contact_us_address_line_2_1' => 'required|string|max:255',
            '__contact_us_address_line_2_data_1' => 'required|string|max:255',
            '__contact_us_address_title_2' => 'required|string|max:255',
            '__contact_us_address_icon_2' => 'required|string|max:255',
            '__contact_us_address_line_1_2' => 'required|string|max:255',
            '__contact_us_address_line_2_data_2' => 'required|string|max:255',
            '__contact_us_address_line_2_2' => 'required|string|max:255',
            '__contact_us_address_line_1_data_2' => 'required|string|max:255',
        ]);

        DB::beginTransaction();
        try {
            __add_stg('__contact_us_form_text', $data['__contact_us_form_text'], 'text', 'home');
            __add_stg('__contact_us_title_1', $data['__contact_us_title_1'], 'string', 'home');
            __add_stg('__contact_us_title_2', $data['__contact_us_title_2'], 'string', 'home');
            __add_stg('__contact_us_address_title_1', $data['__contact_us_address_title_1'], 'string', 'home');
            __add_stg('__contact_us_address_icon_1', $data['__contact_us_address_icon_1'], 'string', 'home');
            __add_stg('__contact_us_address_line_1_1', $data['__contact_us_address_line_1_1'], 'string', 'home');
            __add_stg('__contact_us_address_line_2_1', $data['__contact_us_address_line_2_1'], 'string', 'home');
            __add_stg('__contact_us_address_line_1_data_1', $data['__contact_us_address_line_1_data_1'], 'string', 'home');
            __add_stg('__contact_us_address_line_2_data_1', $data['__contact_us_address_line_2_data_1'], 'string', 'home');
            __add_stg('__contact_us_address_title_2', $data['__contact_us_address_title_2'], 'string', 'home');
            __add_stg('__contact_us_address_icon_2', $data['__contact_us_address_icon_2'], 'string', 'home');
            __add_stg('__contact_us_address_line_1_2', $data['__contact_us_address_line_1_2'], 'string', 'home');
            __add_stg('__contact_us_address_line_2_2', $data['__contact_us_address_line_2_2'], 'string', 'home');
            __add_stg('__contact_us_address_line_1_data_2', $data['__contact_us_address_line_1_data_2'], 'string', 'home');
            __add_stg('__contact_us_address_line_2_data_2', $data['__contact_us_address_line_2_data_2'], 'string', 'home');

            DB::commit();

        } catch (Exception $exception) {

            DB::rollBack();

            return redirect()->back()->with('flash_error', '?????????? ???? ?????? ?????????? ???????? ???? ????????!');

        }

        return redirect()->back()->with('flash_message', '?????????????? ???? ???????????? ?????????? ????!');
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
                $page->title . ' [' . str_replace(['page', 'post'], ['????????', '??????'], $page->type) . "#{$page->id}" . ']';
        }

        return $items;
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|mixed
     */
    public function create(\Illuminate\Http\Request $request)
    {
        $pageTitle = '?????????????? ?????? ???????? ???? ????';
        $breadcrumb = [];
        $pageBc = '?????????????? ???????? ???? ????';
        $pageSubtitle = '';

        return view('front.carly.setting.module_views.contact', [
            'pageTitle' => $pageTitle,
            'breadcrumb' => $breadcrumb,
            'pageBc' => $pageBc,
            'pageSubtitle' => $pageSubtitle,
            'pages' => $this->getLinkablePages()]);
    }
}
