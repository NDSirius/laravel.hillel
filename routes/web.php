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
Route::group(
    [
        'prefix' => 'account',
        'namespace' => 'account',
        'as' => 'account',
    ],
    function (){
        //Route::get('/',['as' => 'welcome', 'uses' => 'HomeController@index']);
}
);
Route::group(
    [
        'prefix' => 'admin',
        'namespace' => 'admin',
        'as' => 'admin',
    ],
    function (){
        //Route::get('/',['as' => 'welcome', 'uses' => 'HomeController@index']);
}
);
