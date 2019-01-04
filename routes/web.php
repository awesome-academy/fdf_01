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

Route::get('/', [
    'uses' => 'FDFUser\IndexController@getIndex',
    'as' => 'home-page'
]);

Route::namespace('Lang')->group(function (){

    Route::post('/lang', [
    	'as' => 'switchLang',
    	'uses' => 'LangController@postLang',
    ])->middleware('localization');

});
