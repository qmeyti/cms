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
