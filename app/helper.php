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

if (!function_exists('__active_links')) {

    /**
     * Get an array of routes and return `active` if current route equal to it
     *
     * @param array $route_names
     * @return string
     */
    function __active_links(array $route_names): string
    {
        if (in_array(__route(), $route_names))
            return 'active';
        else
            return '';
    }

}

