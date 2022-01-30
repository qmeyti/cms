<?php

namespace App\Libraries\Translation;

use App\Models\Language;
use App\Models\TranslationKey;
use Illuminate\Filesystem\Filesystem;

class Translation
{
    private static array $translations;


    /**
     *
     * @param $key
     * @return mixed
     */
    public static function getTranslation($key)
    {
        return self::$translations;
    }

    /**
     * @param mixed $translations
     */
    public static function setTranslations(array $translations): void
    {
        self::$translations = $translations;
    }


    /**
     * @param string $side
     */
    public static function callTranslation(string $side)
    {
       // check cache exist
       if(file_exists(storage_path('framework/cache/translation/'.__lng().'-'. $side . '.txt'))){
           $rs = file_get_contents(storage_path('framework/cache/translation/'.__lng().'-'. $side .'.txt'));
           self::$translations = unserialize($rs);
           return true;
       }



       // create cache file
       $languages= Language::all();
       foreach($languages as $language){
        $translations = TranslationKey::with(['translations' => function ($query) use($language) {
            $query->where('language',$language->code);
        }])->where('side', $side)->get();
//        dd($translations);
        if(!! $translations->count()){
        foreach ($translations as $item) {
            $t = $item->translations->first();
            self::$translations[$item->key] = is_null($t) ? "" : $t->translation;
        }

       $string_data = serialize(self::$translations);
       file_put_contents(storage_path('framework/cache/translation/'.$language->code.'-'. $side . '.txt'), $string_data );
       self::$translations=[];
    }


    }


    }
    /**
     * @param $key
     * @return string
     */
    public static function find($key): string
    {
//        dd(self::$translations[$key]);
        if(isset(self::$translations[$key]))
            return self::$translations[$key];
        return "";
    }


    public static function clearCache()
    {
    $file = new Filesystem;
    $file->cleanDirectory(storage_path('framework/cache/translation'));
    }


}
