<?php

namespace App\Http\Middleware;

use App\Libraries\SettingProducer;
use Closure;
use Illuminate\Http\Request;

class SettingMiddleware
{
    /**
     * @param Request $request
     * @param Closure $next
     * @param string $part
     * @return mixed
     * @throws \Exception
     */
    public function handle(Request $request, Closure $next,string $part)
    {
        new  SettingProducer($part);

        return $next($request);
    }
}
