<?php

namespace App\Providers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        if (File::exists(base_path('resources/laravel-admin/menus.php'))) {
            $data = require_once __DIR__.'/../../resources/laravel-admin/menus.php';
            view()->share('laravelAdminMenus', $data);
        }

    }
}
