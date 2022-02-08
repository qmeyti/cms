<?php

use App\Models\MenuItem;
use Illuminate\Support\Facades\Route;

/**
 * Get sidebar categories list
 */
function get_main_menu()
{

    $menuItems = \App\Models\MenuItem::where('menu', __stg('__main_menu', 1))
        ->orWhere('id', '1')
        ->orderBy('sort')
        ->get(['id', 'label', 'link', 'type', 'parent', 'sort', 'class', 'menu', 'depth']);


    if ($menuItems->count() == 0)
        return '';

        // dd($menuItems->toArray());

    $menuItems = $menuItems->toArray();

    $menuItemsArray = [];
    if ($menuItems) {
        foreach ($menuItems as $cat) {
            $menuItemsArray['items'][$cat['id']] = $cat;
            $menuItemsArray['parents'][$cat['parent']][] = $cat['id'];
        }
    }

    /**
     * @Todo
     * @param $item
     * @return mixed
     */
    function getMenuLink($item)
    {

        if ($item['type'] === 'url' )
            return url($item['link']);
        if ($item['type'] === 'route' && Route::has($item['link']) )
            return route($item['link']);
        else
            return '';

    }


    /**
     * @param $parent
     * @param $allItems
     * @return string
     */


    function isActive($key , $activeClassName = 'active') {
        // dd(array_values($key));

        if(is_array($key)) {
            // dd($key);
            return in_array(Route::currentRouteName() , $key) || in_array(request()->path()  , $key) ? $activeClassName : '';
        }
        return Route::currentRouteName() == $key || request()->path()== $key ? $activeClassName :  '';
    }


    function child($items,$allItems){

    $childroute= '';

      foreach ($allItems['parents'][$items] as $cat_id) {

        if (!isset($allItems['parents'][$cat_id])) {
            $childroute .= $allItems['items'][$cat_id]['link'] ."/";
        }

        if (isset($allItems['parents'][$cat_id])) {
            $childroute.= $allItems['items'][$cat_id]['link']."/";

            $childroute .=child($cat_id,$allItems);

        }

      }

     $MyChild = $childroute;
     unset($childroute);

      return $MyChild;
    }




    function getMenuItemsRecursive($parent, $allItems)
    {

    // dd($allItems);


        $html = "" . PHP_EOL;
        if (isset($allItems['parents'][$parent])) {

            foreach ($allItems['parents'][$parent] as $cat_id) {
                if (!isset($allItems['parents'][$cat_id])) {
                    //وقتی منوی اصلی زیر منو ندازد
                    $html .= '<li class="nav-item"><a href="' . getMenuLink($allItems['items'][$cat_id]) . '" class="nav-link  '.isActive($allItems['items'][$cat_id]['link']).'">' . $allItems['items'][$cat_id]['label'] . '</a></li>' . PHP_EOL;

                }

                if (isset($allItems['parents'][$cat_id])) {

                    // dd($cat_id);
                    // dd($allItems);
                    // $cat_id=7;
                    $MyChild= child($cat_id,$allItems);

                    $MyChild = array_filter(explode("/",$MyChild));

                    $MyChild[]=$allItems['items'][$cat_id]['link'];

                    $html .= '<li class="nav-item"><a href="' . getMenuLink($allItems['items'][$cat_id]) . '" class="nav-link dropdown-toggle  '.isActive($MyChild) .'">' . $allItems['items'][$cat_id]['label'] . ' <i class="fa fa-chevron-left"></i></a>' . PHP_EOL;
                    $html .= ' <ul class="dropdown-menu">' . PHP_EOL;
                    $html .= getMenuItemsRecursive($cat_id, $allItems);
                    $html .= "</ul> " . PHP_EOL;
                    $html .= "</li> " . PHP_EOL;

                }
            }
            $html .= "" . PHP_EOL;
        }
        return $html;
    }



//    dd($menuItemsArray);
    return getMenuItemsRecursive(1, $menuItemsArray);

}

/**
 * Get sidebar categories list
 *
 * @return string
 */
function get_sidebar_categories()
{
    $cats = \App\Models\Category::all(['title', 'slug', \Illuminate\Support\Facades\DB::raw('IFNULL(`parent`,0) AS `parent`'), 'id'])->toArray();

    $category = [];
    if ($cats) {
        foreach ($cats as $cat) {
            $category['categories'][$cat['id']] = $cat;
            $category['parent_cats'][$cat['parent']][] = $cat['id'];
        }
    }

    $i = 0;
    function get_recursive_categories($parent, $category)
    {
        global $i;
        $i++;
        $html = "";
        if (isset($category['parent_cats'][$parent])) {
            $html .= '<ul class="'.($i === 1?'service-list':'').'">' . PHP_EOL;
            foreach ($category['parent_cats'][$parent] as $cat_id) {
                if (!isset($category['parent_cats'][$cat_id])) {
                    $html .= '<li><a href="' . route('front.blog', ['category' => $category['categories'][$cat_id]['slug']]) . '">' . $category['categories'][$cat_id]['title'] . '</a></li>' . PHP_EOL;
                }
                if (isset($category['parent_cats'][$cat_id])) {
                    $html .= '<li><a href="' . route('front.blog', ['category' => $category['categories'][$cat_id]['slug']]) . '">' . $category['categories'][$cat_id]['title'] . '</a>' . PHP_EOL;
                    $html .= get_recursive_categories($cat_id, $category);
                    $html .= "</li> " . PHP_EOL;
                }
            }
            $html .= "</ul> " . PHP_EOL;
        }
        return $html;
    }

    return get_recursive_categories(0, $category);
}

