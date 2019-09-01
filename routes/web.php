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
Route::get('/product', 'ProductController@index')->name('product');
Route::get('/product/showProduct/{id}', 'ProductController@show')->name('product.show');
Route::get('/category', 'CategoryController@index')->name('category');
Route::get('/category/showCategory/{id}', 'CategoryController@show')->name('category.show');


Route::group(
    [
        'prefix' => 'account',
        'middleware' => 'auth',
        'as' => 'account.'
    ],
    function(){
    Route::get('/user', 'UserController@index')->name('user');
    Route::get('/myAccount', 'UserController@account')->name('user.account');
    Route::get('/myAccount/userEdit', 'UserController@edit')->name('user.edit');
    Route::post('/myAccount/{user}/update', 'UserController@update')->name('user.update');
    });

Route::group(
    [
        'namespace' => 'Admin',
        'prefix' => 'admin',
        'middleware' => 'admin',
        'as' => 'admin.',
    ],
    function (){
        Route::get('/admin', 'AdminController@index')->name('admin');
        Route::get('/users', 'UsersController@index')->name('admin.users');
        Route::get('/users/showUser/{id}', 'UsersController@show')->name('admin.userShow');
        Route::get('/users/editUser/{id}', 'UsersController@edit')->name('admin.userEdit');
        Route::get('/orders', 'OrderController@index')->name('admin.orders');
        Route::get('/orders/showOrder/{id}', 'OrderController@show')->name('admin.orderShow');
        Route::get('/products/create', 'ProductController@create')->name('products.create');
        Route::post('/products/store', 'ProductController@store')->name('products.store');
        Route::get('/category/create', 'CategoryController@create')->name('categories.create');
        Route::post('/category/store', 'CategoryController@store')->name('categories.store');
        Route::get('/orders/create', 'OrderController@create')->name('orders.create');
        Route::post('/orders/store', 'OrderController@store')->name('orders.store');


    }
);
