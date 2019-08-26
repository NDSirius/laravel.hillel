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
Route::get('/product', 'ProductController@index')->name('products.index');
Route::get('/product/showProduct/{id}', 'ProductController@show')->name('products.show');
Route::get('/category', 'CategoryController@index')->name('category.index');
Route::get('/category/showCategory/{id}', 'CategoryController@show')->name('category.show');


Route::group(['middleware' => 'auth', 'as' => 'account'],
    function(){
    Route::get('/user', 'UsersController@index')->name('user.index');
    Route::get('/myAccount', 'UsersController@account')->name('user.account');
    Route::get('/myAccount/userEdit', 'UsersController@edit')->name('user.edit');
    Route::post('/myAccount/userEdit', 'UsersController@update')->name('user.update');
    });

Route::group(
    [
        'middleware' => 'admin',
        'as' => 'admin',
    ],
    function (){
        Route::get('/admin', 'AdminController@index')->name('admin.index');
        Route::get('/users', 'Admin\UsersController@index')->name('admin.users');
        Route::get('/users/showUser/{id}', 'Admin\UsersController@show')->name('admin.userShow');
        Route::get('/orders', 'Admin\OrderController@index')->name('admin.orders');
        Route::get('/orders/showOrder/{id}', 'Admin\OrderController@show')->name('admin.orderShow');
}
);
