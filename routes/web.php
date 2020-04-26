<?php

use Illuminate\Support\Facades\App;
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
Route::get('/', function () {
    $local = App::getLocale();
    if($local == 'en'){
        return view('en');
    }
    else{
        return view('de');
    }

});


Route::group(['prefix'=>'{language}'], function(){

    Route::get('/', function () {
        return view('welcome');
    });

    Auth::routes();

    Route::group(['middleware'=>'admin'], function(){

        Route::get('/admin', 'AdminController@index')->name('admin.index');
        Route::get('/admin/profile', 'AdminController@profile')->name('admin.profile');
        Route::get('/admin/profile/edit', 'AdminController@edit')->name('admin.profile.edit');
        Route::put('/admin/profile/update', 'AdminController@update')->name('admin.profile.update');
    });


});



