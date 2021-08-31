<?php

namespace App\Libraries;

use App\Models\Page;

class PageInterpreter
{
    /**
     * Get post url
     *
     * @param Page $page
     * @return string
     */
    public static function pageUrl(Page $page)
    {
        $routeName = __stg('single_page_route_name');

        if ($routeName == 'front.single.slug') {

            return route('front.single.slug', ['slug' => __urlencode($page->slug)]);

        } /**
         * $routeName == 'front.single.id'
         */
        else {

            return route('front.single.id', ['id' => __urlencode($page->id)]);

        }
    }

    /**
     * Get post feature photo
     *
     * @param Page $page
     * @param string|null $default
     * @return mixed|string
     */
    public static function featurePhoto(Page $page, string $default = null)
    {

        if (!empty($page->feature_photo))
            return $page->feature_photo;

        return $default;

    }

    /**
     * Get page author name
     *
     * @param Page $page
     * @param string|null $field
     * @return string
     */
    public static function author(Page $page, string $field = null)
    {
        $mode = $field ?? __stg('page_author_name_show_model', 'nickname');

        if ($mode === 'fullname') {

            return $page->writer->name . ' ' . $page->writer->family;

        } elseif ($mode === 'username') {

            return $page->writer->username ?? 'ناشناس';

        } elseif ($mode === 'role') {

            $role = $page->writer->roles->first();

            if (!is_null($role))
                return $role->label;

        } elseif ($mode === 'family') {

            return $page->writer->family;

        } elseif ($mode === 'nickname') {

            return $page->writer->nickname;

        }

        return $page->writer->name;

    }

    /**
     * @param Page $page
     * @return mixed
     */
    public function getAboutAuthor(Page $page)
    {
        return $page->writer->about;
    }

    /**
     * @param Page $page
     * @return string
     */
    public static function title(Page $page)
    {
        return $page->title;
    }

    /**
     * @param Page $page
     * @param string $format
     * @param string $type
     * @return string
     */
    public static function getDate(Page $page, string $format, string $type = 'jalali')
    {
        if ($type === 'jalali') {

            return jdate($page->creatd_at ?? now())->format($format);

        } else {
            /**
             * Todo
             */
            return '';
        }
    }
}
