<?php

namespace App\Libraries\Translation;

use Illuminate\Filesystem\Filesystem;

class CacheTranslation
{

    public static function checkCasheExist(string $side)
    {
        if (file_exists(storage_path('framework/cache/translation/' . __lng() . '-' . $side . '.txt'))) {

            $rs = file_get_contents(storage_path('framework/cache/translation/' . __lng() . '-' . $side . '.txt'));

            return unserialize($rs);

        }

        return array();
    }

    public static function clearCache()
    {
        $file = new Filesystem;
        $file->cleanDirectory('storage/framework/cache/translation');
    }

}
