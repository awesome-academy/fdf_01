<?php

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

Route::pattern('id', '[0-9]*');
Route::pattern('slug', '(.*)');

Route::group(['middleware' => 'localization'], function()
{
    Route::resource('register', 'Register');
    Route::resource('login', 'Login');
    Route::resource('logout', 'Login');
});

Route::get('/redirect/{social}', 'SocialAuthController@redirect');
Route::get('/callback/{social}', 'SocialAuthController@callback');

Route::namespace('FDFUser')->middleware('localization')->group(function(){

    Route::resource('/', 'Index');

    Route::resource('categories', 'Categories');

    Route::resource('product-detail', 'Products');

    Route::resource('profile', 'Profile');

    Route::group(['middleware' => 'checkLogin'], function(){

        Route::resource('cart', 'ShoppingCart');
    });
});

Route::namespace('FDFAdmin')->middleware('localization')->group(function()
{
    Route::group(['middleware' => 'checkAdminLogin'], function(){

        Route::resource('admin', 'Index');

        Route::resource('managing-user', 'ManagingUser');

        Route::resource('managing-product', 'ManagingProduct');

        Route::post('update-status',[
            'uses' => 'ManagingProduct@updateStatus',
        ]);
    });
});

Route::namespace('Lang')->group(function ()
{
    Route::post('/lang', [
        'as' => 'switchLang',
        'uses' => 'LangController@postLang',
    ])->middleware('localization');
});

Route::get('desSS', function () {
    Session::flush();
});
