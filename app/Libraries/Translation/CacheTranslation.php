<?php

namespace App\Libraries\Translation;
use Illuminate\Filesystem\Filesystem;

class CacheTranslation
{

    public static function checkCasheExist(string $side)
   {
    if(file_exists(storage_path('framework/cache/translation/'.__lng().'-'. $side . '.txt'))){
        //    dd('hi');
           $rs = file_get_contents(storage_path('framework/cache/translation/'.__lng().'-'. $side .'.txt'));
        //    self::$translations = unserialize($rs);
           return unserialize($rs);

        //    return true;
        
           //    dd( self::$translations);
        //    return true;
        //    dd(self::$translations);
       }
       return array();
   }

    public static function clearCache()
    {
        $file = new Filesystem;
        $file->cleanDirectory('storage/framework/cache/translation');
    }

}
