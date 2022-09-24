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
Route::get('/'                              , 'HomeController@home');
Route::get('/order'                         , 'HomeController@index');

Route::group(['middleware' => ['web']], function () {
    Route::get('/logout'                        , 'AuthController@logout');
    Route::get('/login'                         , 'AuthController@loginPage')->name('login');
    Route::post('/login'                        , 'AuthController@login');
    Route::post('/activate'                     , 'AuthController@loginWithoutPassword');
    Route::post('/resend-activate'              , 'AuthController@resendActivation');
});

Route::get('/user'                          , 'User\ProfileController@dashboard');
Route::post('/user/profile/update'          , 'User\ProfileController@updateProfile');
Route::post('/user/address/insert'          , 'User\ProfileController@insertAddress');
Route::post('/user/address/remove'          , 'User\ProfileController@removeAddress');
Route::get('/user/plates'                   , 'User\ProductController@createProduct');
Route::post('/user/create-plate'            , 'User\ProductController@insertProduct');
Route::post('/user/plate/delete'            , 'User\ProductController@delete');

Route::get('/user/orders'                   , 'User\OrderController@all');
Route::post('/user/orders/showmore'                , 'User\OrderController@showMore');

Route::post('/products/get'                 , 'HomeController@takeProductsFromCategory');
Route::post('/products/getmine'             , 'HomeController@getMyProducts');
Route::post('/orders/updatebasket'          , 'HomeController@updateBasket');
Route::post('/orders/showbasket'            , 'HomeController@showBasket');
Route::post('/orders/updatecount'           , 'HomeController@updateCount');
Route::post('/orders/insert'                , 'User\OrderController@insert');
//'isAdmin',

Route::prefix('admin')->group(function(){
    Route::middleware(['web','auth'])->group(function(){
        Route::get('/'                      ,'Admin\CategoryController@new');
        Route::get('/users/all'             ,'Admin\UserController@all');
        Route::post('/users/delete'          ,'Admin\UserController@delete');
        Route::post('/users/single'         ,'Admin\UserController@single');
        Route::post('/users/update'         ,'Admin\UserController@update');

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

        Route::get('/categories/new'        ,'Admin\CategoryController@new');
        Route::get('/categories/all'        ,'Admin\CategoryController@all');
        Route::post('/categories/delete'    ,'Admin\CategoryController@delete');
        Route::post('/categories/create'    ,'Admin\CategoryController@create');
        Route::post('/categories/update'    ,'Admin\CategoryController@update');

        Route::get('/orders'                ,'Admin\OrderController@all');
        Route::get('/orders/changestatus'   ,'Admin\OrderController@status');
        Route::post('/orders/delete'        ,'Admin\CategoryController@delete');
    });
});
