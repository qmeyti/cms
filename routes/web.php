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



Route::group(['namespace' => 'App\Http\Controllers\Admin'], function () {

    Route::get('locale/{lang}', 'LanguageController@switch')->name('locale');
});

Route::group(['middleware' => ['locale','sharelanguages']], function () {

    require __DIR__ . '/auth.php';

    Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'role:admin', 'as_init']], function () {

        Route::get('/', 'AdminController@index')->name('dashboard');
    
        Route::resource('/roles', 'RolesController');
    
        Route::resource('/permissions', 'PermissionsController');
    
        //////
        
        Route::resource('/modules', 'ModuleController');
    
        Route::resource('/languages', 'LanguageController');
    
    
        //////
    
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
    
    
    
    
    
    Route::name('front.')->namespace('App\Http\Controllers\Front')->middleware(['fs_init'])->group(function () {
    
    
        Route::get('/page/{page}', 'HomeController@index')->name('page.show');
    
        Route::post('/contact', 'HomeController@contact')->name('contact.store');
    
        Route::post('/newsletter', 'HomeController@newsletter')->name('newsletter.store');
    
        //Add new comment
        Route::resource('/comments', 'CommentController');
    
        //Blog posts show
        Route::get('/blog/{category?}', 'BlogController@blog')->name('blog');
        Route::get('/favored/posts', 'BlogController@favoredPosts')->name('favored.posts');
        Route::get('/liked/posts', 'BlogController@likedPosts')->name('liked.posts');
        Route::get('/tag/{tag}', 'BlogController@tagPosts')->name('tag.posts');
        Route::get('/author/{id}', 'BlogController@authorPosts')->name('author.posts');
    
        //Like & favorite actions
        Route::post('/favorite/{post}', 'FavoriteController@favorite')->name('favorite.post');
        Route::post('/like/{post}', 'LikeController@like')->name('like.posts');
        Route::post('/dislike/{post}', 'LikeController@dislike')->name('dislike.post');
    
        Route::get('/', 'HomeController@index')->name('home');
    
        Route::get('/post/{id}', 'BlogController@postId')->name('single.id');
        Route::get('/{slug}', 'BlogController@postSlug')->name('single.slug');
    
    });
    

});


