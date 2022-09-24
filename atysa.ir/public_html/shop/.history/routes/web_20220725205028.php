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
// Auth::routes();

Route::get('/home'                          , 'HomeController@index');
Route::get('/'                              , 'HomeController@index');

Route::get('/logout'                         , 'AuthController@loginPage');
Route::get('/login'                         , 'AuthController@loginPage');
Route::post('/login'                        , 'AuthController@login');
Route::post('/activae'                      , 'AuthController@login');
Route::prefix('admin')->group(function(){
    Route::middleware(['isAdmin','web'])->group(function(){
        Route::get('/users/'                ,'Admin\UserController@all');
        Route::get('/users/single'          ,'Admin\UserController@all');
        Route::post('/users/delete'         ,'Admin\UserController@all');

        Route::get('/materials/new'         ,'Admin\MaterialController@new');
        Route::get('/materials/single/{id}' ,'Admin\MaterialController@single');
        Route::get('/materials/all'         ,'Admin\MaterialController@all');
        Route::post('/materials/delete'     ,'Admin\MaterialController@delete');
        Route::post('/materials/create'     ,'Admin\MaterialController@create');
        Route::post('/materials/update'     ,'Admin\MaterialController@update');

        Route::get('/plates/new'            ,'Admin\PlateController@new');
        Route::get('/plates/single/{id}'    ,'Admin\PlateController@single');
        Route::get('/plates/all'            ,'Admin\PlateController@all');
        Route::post('/plates/delete'        ,'Admin\PlateController@delete');
        Route::post('/plates/create'        ,'Admin\PlateController@create');
        Route::post('/plates/update'        ,'Admin\PlateController@update');

        Route::get('/categories/new'            ,'Admin\CategoryController@new');
        Route::get('/categories/all'            ,'Admin\CategoryController@all');
        Route::post('/categories/delete'        ,'Admin\CategoryController@delete');
        Route::post('/categories/create'        ,'Admin\CategoryController@create');
        Route::post('/categories/update'        ,'Admin\CategoryController@update');
    });
});
