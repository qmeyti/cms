<?php

namespace App\Libraries;


class Sanitize
{
    /**
     * Sanitize string
     *
     * @param string $field
     * @param string|null $default
     * @param \Illuminate\Http\Request|null $request
     * @return array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\Request|string|null
     */
    public static function stringRequest(string $field, string $default = null, \Illuminate\Http\Request $request = null)
    {
        $request = $request ?? \request();

        if (empty($content = $request->input($field)))
            return $request->merge([$field => '']);

        if (!is_string($content))
            throw new \Symfony\Component\HttpFoundation\File\Exception\UnexpectedTypeException($content, 'string');

        return $request->merge([$field => self::sanitizeString($content)]);
    }

    /**
     * Sanitize string
     *
     * @param string $content
     * @return string
     */
    public static function sanitizeString(string $content)
    {
        $content = strip_tags($content);

        $content = htmlentities($content);

        $content = preg_replace('/\s+/', ' ', $content);

        return trim($content);
    }

    /**
     * Sanitize numbers
     *
     * @param string $field
     * @param int $default
     * @param \Illuminate\Http\Request|null $request
     * @return array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\Request|string|null
     */
    public static function numberRequest(string $field, $default = 0, \Illuminate\Http\Request $request = null)
    {
        $request = $request ?? \request();

        if (empty($content = $request->input($field)))
            return $request->merge([$field => $default]);

        $content = __num2en($content);

        if (is_numeric($content))
            return $request->merge([$field => $content]);

        return $request->merge([$field => $default]);
    }
}
