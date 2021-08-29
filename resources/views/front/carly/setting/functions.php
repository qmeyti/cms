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
 * @param \App\Models\Page $page
 * @param string $model
 * @return string
 */
function __page_url(\App\Models\Page $page, string $model = '')
{

    $url = route('front.page.show',['page' => $page->id]);

    return $url;
}

/**
 * @param \App\Models\Page $page
 * @param string|null $default
 * @return mixed|string
 */
function __feature_photo(\App\Models\Page $page,string $default = null){
    if (!empty($page->feature_photo))
        return $page->feature_photo;

    return $default ?? asset('front/carly/assets/img/noimage370x250.png');
}
