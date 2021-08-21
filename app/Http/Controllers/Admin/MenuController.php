<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Page;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * @return array
     */
    private function getLinkablePages()
    {
        $pages = Page::getLinkablePages();

        $items = [];
        foreach ($pages as $page) {
            $items[$page->id] =
                $page->title . ' [' . str_replace(['page', 'post'], ['صفحه', 'خبر'], $page->type) . "#{$page->id}" . ']';
        }

        return $items;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $menus = Menu::all();

        /**
         * Get selected menu
         */
        $menu = null;
        $pages = [];
        $itemsEditPanels = [];

        if ($request->has('menu')) {

            /**
             * Load selected menu
             */

            $menu = Menu::with('items')->where('id', intval($request->input('menu')))->first();
            /**
             * Load linkable pages
             */
            $pages = $this->getLinkablePages();

            /**
             * Load edit form views for menu
             */
            if (!is_null($menu)) {
                foreach ($menu->items as $mi) {
                    $itemsEditPanels[$mi->id] =
                        (string)view('admin.menus.edit_' . str_replace(['url', 'page', 'route'], ['link', 'page', 'route'], $mi->type), ['item' => $mi, 'pages' => $pages, 'menu' => $menu])->render();
                }
            }
        }


        return view('admin.menus.index', compact('menus', 'menu', 'pages', 'itemsEditPanels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        __sanitize('name');

        $data = $request->validate(['name' => 'required|string|max:255|min:1']);

        $menu = Menu::create($data);

        return redirect()->route('menus.index', ['menu' => $menu->id])->with('flash_message', 'منو با موفقیت ایجاد شد!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * @param Request $request
     * @param Menu $menu
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Menu $menu)
    {
        __sanitize('name');

        $data = $request->validate(['name' => 'required|string|max:255|min:1']);

        $menu->update($data);

        return redirect()->route('menus.index', ['menu' => $menu->id])->with('flash_message', 'منو با موفقیت ویرایش شد!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
