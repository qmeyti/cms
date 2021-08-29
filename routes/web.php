<?php

//use Illuminate\Support\Facades\Route;

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

require __DIR__ . '/auth.php';

Route::name('front.')->namespace('App\Http\Controllers\Front')->middleware(['fs_init'])->group(function () {

    Route::get('/', 'HomeController@index');

    Route::get('/page/{page}', 'HomeController@index')->name('page.show');

    Route::post('/contact', 'HomeController@contact')->name('contact.store');

    Route::post('/newsletter', 'HomeController@newsletter')->name('newsletter.store');

});

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'role:admin', 'as_init']], function () {

    Route::get('/', 'AdminController@index')->name('dashboard');

    Route::resource('/roles', 'RolesController');

    Route::resource('/permissions', 'PermissionsController');

    Route::resource('/users', 'UsersController');

    Route::resource('/pages', 'PagesController');

    Route::resource('/slider', 'SliderController');

    Route::resource('/tags', 'TagController');

    Route::resource('/sliders', 'SliderController');

    Route::resource('/{slider}/slides', 'SlideController');

    Route::resource('/category', 'CategoryController');

    Route::resource('/contacts', 'ContactController');

    //Menu
    Route::resource('/menus', 'MenuController');

    Route::resource('/{menu}/menu_items', 'MenuItemController');

    Route::post('order/{menu}/items', 'MenuItemController@order')->name('order.menu.item');

    //Template
    Route::resource('{module}/template', 'TemplateController');

    //Log
    Route::resource('/activitylogs', 'ActivityLogsController')->only([
        'index', 'show', 'destroy'
    ]);

    //Settings
    Route::resource('/settings', 'SettingsController');

    //Generator
    Route::get('/generator', ['uses' => 'ProcessController@getGenerator'])->name('generator');

    Route::post('/generator', ['uses' => 'ProcessController@postGenerator']);

});

