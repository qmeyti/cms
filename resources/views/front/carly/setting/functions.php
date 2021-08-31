<?php

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
        if ($item['type'] === 'url' || $item['type'] === 'route')
            return $item['link'];
        else
            return '';
    }

    /**
     * @param $parent
     * @param $allItems
     * @return string
     */
    $i = 0;
    function getMenuItemsRecursive($parent, $allItems)
    {
        global $i;
        $i++;
        $html = "";
        if (isset($allItems['parents'][$parent])) {
            $html .= '<ul class="' . ($i > 1 ? 'sub-menu text-right' : '') . '">' . PHP_EOL;
            foreach ($allItems['parents'][$parent] as $cat_id) {
                if (!isset($allItems['parents'][$cat_id])) {
                    $html .= '<li><a href="' . getMenuLink($allItems['items'][$cat_id]) . '">' . $allItems['items'][$cat_id]['label'] . '</a></li>' . PHP_EOL;
                }
                if (isset($allItems['parents'][$cat_id])) {
                    $html .= '<li><a href="' . getMenuLink($allItems['items'][$cat_id]) . '">' . $allItems['items'][$cat_id]['label'] . ' <i class="far fa-plus"></i></a></a>' . PHP_EOL;
                    $html .= getMenuItemsRecursive($cat_id, $allItems);
                    $html .= "</li> " . PHP_EOL;
                }
            }
            $html .= "</ul> " . PHP_EOL;
        }
        return $html;
    }

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

