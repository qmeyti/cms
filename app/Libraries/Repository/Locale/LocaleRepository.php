<?php

namespace App\Libraries\Repository\Locale;

use App\Models\Language;

class LocaleRepository{


    /**
    * find language
    *
    * @param string $lang
    * @return App\Models\Languag|null
    */
    public static function find(string $lang){
       return Language::where('code', $lang)->first();
    }



}
