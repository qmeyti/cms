<?php

namespace App\Http\Middleware;

use App\Libraries\SettingProducer;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminSideMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        /**
         * Load settings
         */
        new SettingProducer('admin');

        /**
         * Load admin sidebar menu
         */
        $sidebar = [];

        if (File::exists(base_path('resources/laravel-admin/menus.php'))) {

            $sidebar = require_once base_path('resources/laravel-admin/menus.php');

        }
        /**
         * Load template sidebar menu items
         */
        if (!empty($tmp = __stg('template')) && File::exists($tmpMenu = base_path("resources/views/front/{$tmp}/setting/menu.php"))) {

            $sidebar = array_merge($sidebar, require_once($tmpMenu));

        }

        view()->share('laravelAdminMenus', $sidebar);

        return $next($request);
    }
}
