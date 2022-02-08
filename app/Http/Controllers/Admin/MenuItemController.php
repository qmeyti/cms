<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use App\Models\Page;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class MenuItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param Menu $menu
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Menu $menu)
    {
        __sanitize('label');

        $data = $request->validate([
            'label' => 'required|string|max:255|min:1',
            'type' => 'required|string|in:page,url,route',
        ]);
        /**
         * If is link
         */
        if ($data['type'] === 'url') {

            //todo check or sanitize link
            
            $data['link'] = $request->validate(['link' => 'nullable|string|max:2000'])['link'];

            // dd(trim($data['link'] , '/'));
            // dd($data['link']);
            $data['link'] = trim($data['link'] , '/');

        }
        if ($data['type'] === 'route') {
            // $data['link']  = app('router')->getRoutes()->match(app('request')->create($data['link']))->action['as'];

            // dd($data['link']);

            $data['link'] = $request->validate(['link' => 'required|url|string|max:2000'])['link'];
            $data['link']  = app('router')->getRoutes()->match(app('request')->create($data['link']))->action['as'];

            // dd('hi');
            // dd(Route::get($data['link']));
            // $route = app('router')->getRoutes()->match(app('request')->create($data['link']))->action['as'];
            // dd($route);
            // $data['link'] = $request->validate(['link' => 'required|url|string|max:2000'])['link'];
            //  dd(Route::get($data['link']));

            // dd($data['link']);

        } /**
         * If is page
         */
        elseif ($data['type'] === 'page') {

            $pages = Page::getLinkablePages();

            $list = implode(',', $pages->pluck('id')->toArray());

            $data['link'] = $request->validate(['link' => 'required|integer|in:' . $list])['link'];

        }


        $data['parent'] = 1;

        $menu->items()->create($data);

        return redirect()->route('menus.index', ['menu' => $menu->id])->with('flash_message', 'گزینه جدید با موفقیت به منو اضافه شد!');

    }

    /**
     * @param Request $request
     * @param Menu $menu
     * @return mixed
     */
    public function order(Request $request, Menu $menu)
    {

        $data = $request->validate([
            'parent' => "nullable|integer|exists:menu_items,id",
            'item' => "required|integer|exists:menu_items,id|different:parent",
        ]);

        //todo check tree

        MenuItem::where('id', $data['item'])->update([
            'parent' => $data['parent']
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'مرتب سازی موفقیت آمیز بود!',
            'data' => $data
        ]);
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
     * @param MenuItem $menuItem
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Menu $menu, MenuItem $menuItem)
    {
        __sanitize('label');

        $data = $request->validate([
            'label' => 'required|string|max:255|min:1',
        ]);
        /**
         * If is link
         */
        if ($menuItem->type === 'url') {

            //todo check or sanitize link
            $data['link'] = $request->validate(['link' => 'nullable|string|max:2000'])['link'];

        }
        if ($menuItem->type === 'route') {

            $data['link'] = $request->validate(['link' => 'required|url|string|max:2000'])['link'];

        } /**
         * If is page
         */
        elseif ($menuItem->type === 'page') {

            $pages = Page::getLinkablePages();

            $list = implode(',', $pages->pluck('id')->toArray());

            $data['link'] = $request->validate(['link' => 'required|integer|in:' . $list])['link'];

        }

        $menuItem->update($data);

        return redirect()->route('menus.index', ['menu' => $menu->id])->with('flash_message', 'ویرایش منو با موفقیت انجام شد!');

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
