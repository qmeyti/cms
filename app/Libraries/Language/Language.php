<?php

namespace App\Libraries\Language;

class Language
{
    /**
     * @var string
     */
    private static string $dir = 'rtl';

    /**
     * @param string $dir
     * @return void
     */
    public static function setDir(string $dir): void
    {
        self::$dir = $dir;
    }

    /**
     * @return string
     */
    public static function getDir(): string
    {
        return self::$dir;
    }
}
