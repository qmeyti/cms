<?php

if (!function_exists('__sanitize')) {

    /**
     * @param string $field
     * @param string|null $default
     * @param \Illuminate\Http\Request|null $request
     * @return array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\Request|string|null
     */
    function __sanitize(string $field, string $default = null, \Illuminate\Http\Request $request = null)
    {
        return \App\Libraries\Sanitize::stringRequest($field, $default, $request);
    }
}

/**
 * Sanitize string
 */
if (!function_exists('__sanitize_str')) {

    /**
     * @param string $text
     * @return string
     */
    function __sanitize_str(string $text)
    {
        return \App\Libraries\Sanitize::sanitizeString($text);
    }
}

if (!function_exists('__num_sanitize')) {

    /**
     * Convert persian numbers to english
     *
     * @param string $field
     * @param int $default
     * @param \Illuminate\Http\Request|null $request
     * @return array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\Request|string
     */
    function __num_sanitize(string $field, $default = 0, \Illuminate\Http\Request $request = null)
    {
        \App\Libraries\Sanitize::numberRequest($field, $default, $request);
    }
}

if (!function_exists('__num2en')) {
    /**
     * Change Persian & Arabic digits to english
     *
     * @param $persianNumericString
     * @return array|string|string[]
     */
    function __num2en($persianNumericString)
    {
        return \App\Libraries\Jdf::tr_num($persianNumericString, 'en');
    }
}


if (!function_exists('__null404')) {

    /**
     * @param $data
     * @return mixed
     */
    function __null404($data)
    {

        if (is_null($data))
            abort(404);

        return $data;
    }
}

if (!function_exists('__stg')) {
    /**
     * Get a setting
     *
     * @param string $name
     * @param null $default
     * @return mixed|null
     */
    function __stg(string $name, $default = null)
    {
        return \App\Libraries\SettingProducer::getItem($name, $default);
    }
}


if (!function_exists('__stg_straight')) {
    /**
     * Get a setting straightly from storage
     *
     * @param string $name
     * @param null $default
     * @return mixed|null
     */
    function __stg_straight(string $name, $default = null)
    {
        return \App\Libraries\SettingProducer::getItemStraight($name, $default);
    }
}


if (!function_exists('__add_stg')) {
    /**
     * Add a new setting
     *
     * @param string $key
     * @param $value
     * @param string $type
     * @param string|null $part
     * @return \App\Models\Setting
     */
    function __add_stg(string $key, $value, string $type = 'text', string $part = null)
    {
        return \App\Models\Setting::addOrUpdate($key, $value, $type, $part);
    }
}


if (!function_exists('__route')) {

    /**
     * Return route name
     *
     * @return string
     */
    function __route(): string
    {
        return \Illuminate\Support\Facades\Route::currentRouteName();
    }

}

if (!function_exists('__is_linear')) {
    /**
     * Check array is linear
     *
     * @param array $array
     * @return bool
     */
    function __is_linear(array $array)
    {
        return (count($array) == count($array, COUNT_RECURSIVE));
    }
}

if (!function_exists('__active_links')) {

    /**
     * Get an array of routes and return true if current route was equaled to it
     *
     * @param array $routeNames
     * @param string $routeNameSplit
     * @return string
     */
    function __active_links(array $routeNames, $routeNameSplit = '.'): string
    {
        $route = __route();

        foreach ($routeNames as $routeKey => $routeName) {

            /**
             * Check string type route without params
             */
            if (is_numeric($routeKey) && is_string($routeName)) {
                /**
                 * Recognize simple routes
                 */
                if ($routeName === $route)
                    return true;

                /**
                 * Recognize with regex
                 */
                elseif (count($routePartsArray = explode($routeNameSplit, $routeName)) == 2) {

                    $currentRouteNamePartsArray = explode($routeNameSplit, $route);

                    if ($currentRouteNamePartsArray[0] === $routePartsArray[0] && $routePartsArray[1] === '*') {
                        return true;
                    }

                }

            } /**
             *
             * Check by route params
             */ elseif (is_string($routeKey) && is_array($routeName) && __is_linear($routeName) && $routeKey === $route) {

                $rp = request()->route()->parameters();

                foreach ($routeName as $routeNameKey => $routeNameValue) {

                    if (!(isset($rp[$routeNameKey]) && $rp[$routeNameKey] === $routeNameValue)) {
                        return false;
                    }

                }

                return true;
            }
        }

        return false;
    }

}

if (!function_exists('__urlencode')) {
    /**
     * Convert url query items to standard url string
     *
     * @param string $string
     * @return string
     */
    function __urlencode(string $string)
    {
        return urlencode(utf8_encode($string));
    }
}

if (!function_exists('__urldecode')) {
    /**
     * return url query items to normal text
     *
     * @param string $string
     * @return false|string
     */
    function __urldecode(string $string)
    {
        return utf8_decode(urldecode($string));
    }
}

if (!function_exists('__page_url')) {
    /**
     * Get page url
     *
     * @param \App\Models\Page $page
     * @return string
     */
    function __page_url(\App\Models\Page $page)
    {
        return \App\Libraries\PageInterpreter::pageUrl($page);
    }
}


if (!function_exists('__author')) {
    /**
     * @param \App\Models\Page $page
     * @param string|null $field
     * @return string
     */
    function __author(\App\Models\Page $page, string $field = null)
    {
        return \App\Libraries\PageInterpreter::author($page, $field);
    }
}

if (!function_exists('__comment_author')) {
    /**
     * @param \App\Models\Comment $comment
     * @param string|null $field
     * @return string
     */
    function __comment_author(\App\Models\Comment $comment, string $field = null)
    {
        return \App\Libraries\CommentInterpreter::author($comment, $field);
    }
}

/**
 * @param \App\Models\Comment $comment
 * @param string $format
 * @param string $type
 * @return string
 */
function __comment_date(\App\Models\Comment $comment, string $format = 'd F , Y', string $type = 'jalali')
{
    return \App\Libraries\CommentInterpreter::getDate($comment, $format, $type);
}


/**
 * @param \App\Models\Page $page
 * @return string
 */
function __page_title(\App\Models\Page $page)
{
    return \App\Libraries\PageInterpreter::title($page);
}

/**
 * @param \App\Models\Page $page
 * @return string
 */
function __author_url(\App\Models\Page $page)
{
    return route('front.author.posts', ['id' => $page->author]);
}

/**
 * Get post content
 *
 * @param \App\Models\Page $page
 * @return string
 */
function __page_content(\App\Models\Page $page)
{
    return html_entity_decode($page->content);
}

/**
 * Get post excerpt
 *
 * @param \App\Models\Page $page
 * @return mixed
 */
function __page_excerpt(\App\Models\Page $page)
{
    return $page->excerpt;
}

/**
 * Get a tag url
 *
 * @param string $tag
 * @return string
 */
function __tag_url(string $tag)
{
    return route('front.tag.posts', ['tag' => __urlencode($tag)]);
}

/**
 * Get post feature photo
 *
 *
 * @param \App\Models\Page $page
 * @param string|null $default
 * @return string
 */
function __feature_photo(\App\Models\Page $page, string $default = null)
{
    return \App\Libraries\PageInterpreter::featurePhoto($page, $default);
}

/**
 * @param \App\Models\Page $page
 * @param string $format
 * @param string $type
 * @return string|void
 */
function __page_date(\App\Models\Page $page, string $format = 'd F , Y', string $type = 'jalali')
{
    return \App\Libraries\PageInterpreter::getDate($page, $format, $type);
}
