<?php

namespace App\Libraries;

class GeneralRegex
{
    /**
     * @return string
     */
    public static function tagsRegex()
    {
        return '/([a-zA-Z0-9\-_\x{600}-\x{6FF}\x{200c}\x{064b}\x{064d}\x{064c}\x{064e}\x{064f}\x{0650}\x{0651}\s]{1,100}[,]?)?/u';
    }
}
