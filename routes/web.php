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

Route::group(['namespace' => 'App\Http\Controllers\Front', 'middleware' => []], function () {

    Route::get('/', 'HomeController@index');

});


Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function () {

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

    Route::resource('/activitylogs', 'ActivityLogsController')->only([
        'index', 'show', 'destroy'
    ]);

    Route::resource('/settings', 'SettingsController');

    Route::get('/generator', ['uses' => 'ProcessController@getGenerator']);

    Route::post('/generator', ['uses' => 'ProcessController@postGenerator']);

});

