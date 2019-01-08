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

Route::resource('login', 'Login');

Route::resource('logout', 'Login');

Route::namespace('FDFUser')->middleware('localization')->group(function(){
    Route::resource('/', 'Index');
    //Dat hang thi dung middleware checkLogin, phai dang nhap moi dat hang duoc
});

Route::namespace('FDFAdmin')->group(function(){
    Route::group(['middleware' => 'checkAdminLogin'], function(){
        Route::resource('admin', 'Index');
    });
});

Route::namespace('Lang')->group(function (){
    Route::post('/lang', [
        'as' => 'switchLang',
        'uses' => 'LangController@postLang',
    ])->middleware('localization');
});
