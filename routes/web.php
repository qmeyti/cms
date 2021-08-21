<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::group(['namespace' => 'App\Http\Controllers\Front', 'middleware' => ['setting:home']], function () {

    Route::get('/', 'HomeController@index');

});


Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'role:admin','setting:admin']], function () {

    Route::get('/', 'AdminController@index');

    Route::resource('/roles', 'RolesController');

    Route::resource('/permissions', 'PermissionsController');

    Route::resource('/users', 'UsersController');

    Route::resource('/pages', 'PagesController');

    Route::resource('/slider', 'SliderController');

    Route::resource('/tags','TagController');

    Route::resource('/sliders', 'SliderController');

    Route::resource('/{slider}/slides', 'SlideController');

    Route::resource('/category', 'CategoryController');

    Route::resource('/menus', 'MenuController');

    Route::resource('/{menu}/menu_items', 'MenuItemController');

    Route::post('order/{menu}/items', 'MenuItemController@order')->name('order.menu.item');

    Route::resource('/activitylogs', 'ActivityLogsController')->only([
        'index', 'show', 'destroy'
    ]);

    Route::resource('/settings', 'SettingsController');

    Route::get('/generator', ['uses' => 'ProcessController@getGenerator']);

    Route::post('/generator', ['uses' => 'ProcessController@postGenerator']);

});

