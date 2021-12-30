<?php

namespace App\Http\Middleware;

use App\Libraries\Language\Language;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {


        if(Session::has('locale') ){
         Language::setLanguage(Session::get('locale'));
        App::setLocale(Language::getLanguage());
         
        }
        else{
         Language::setLanguage(config('app.locale'));
        }
        if(Session::has('dir')){
            Language::setDir(Session::get('dir'));
        }
        else{
         Language::setDir(config('cms.direction'));
        }

        return $next($request);
    }
}
