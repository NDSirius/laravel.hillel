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
        'as' => 'account'
    ],
    function(){
    Route::get('/user', 'UserController@index')->name('user');
    Route::get('/myAccount', 'UserController@account')->name('user.account');
    Route::get('/myAccount/userEdit', 'UserController@edit')->name('user.edit');
    Route::patch('/myAccount/userUpdate', 'UserController@update')->name('user.update');
    });

Route::group(
    [
        'prefix' => 'admin',
        'middleware' => 'admin',
        'as' => 'admin',
    ],
    function (){
        Route::get('/admin', 'AdminController@index')->name('admin');
        Route::get('/users', 'Admin\UsersController@index')->name('admin.users');
        Route::get('/users/showUser/{id}', 'Admin\UsersController@show')->name('admin.userShow');
        Route::get('/users/editUser/{id}', 'Admin\UsersController@edit')->name('admin.userEdit');
        Route::get('/orders', 'Admin\OrderController@index')->name('admin.orders');
        Route::get('/orders/showOrder/{id}', 'Admin\OrderController@show')->name('admin.orderShow');

}
);
