<?php

namespace App\Libraries\Language;
use App\Models\Language as ModelLanguage;

class Language{

    private static string $language='fa';
    private static string $dir='rtl';
    
    
    public static function setLanguage(string $language){
        self::$language = $language;
    }
    public static function setDir(string $dir){
        self::$dir = $dir;
    }
    public static function getLanguage():string{
        return self::$language;
    }
    public static function getDir():string{
        return self::$dir;
    }


}