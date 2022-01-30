<?php

namespace App\Http\Middleware;

use App\Libraries\SettingProducer;
use Closure;
use Illuminate\Http\Request;

class FrontSideMiddleware
{
    /**
     * @param Request $request
     * @param Closure $next
     * @param string $part
     * @return mixed
     * @throws \Exception
     */
    public function handle(Request $request, Closure $next)
    {
        /**
         * Load settings
         */
        new SettingProducer('home');
        \App\Libraries\Translation\Translation::callTranslation('front');

        return $next($request);
    }
}
