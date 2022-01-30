<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LangController extends Controller
{
    public function swich($lang)
    {
        // dd($lang);
        // Session::put('locale','fa');
        $myLang = ['fa','en'];
        // dd($myLang);
        // dd(in_array($lang,$myLang));

        if(in_array($lang,$myLang)){
            // dd('salam');
            Session::put('locale',$lang);
            Session::save();
            return redirect()->back();

        };
        Session::put('locale','fa');
        Session::save();
        // dd(Session::get('locale'));
        return redirect()->back();
        
    }


}
