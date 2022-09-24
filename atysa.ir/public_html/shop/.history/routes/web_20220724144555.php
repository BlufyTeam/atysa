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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('admin')->group(function(){
    Route::middleware(['isAdmin','web'])->group(function(){
        Route::get('users//'          ,'Admin\UserController@all');
        Route::get('/single'    ,'Admin\UserController@all');
        Route::get('/delete'    ,'Admin\UserController@all');
    });
});
