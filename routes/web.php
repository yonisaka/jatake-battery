<?php
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

Route::get('/', 'HomeController@index')->name('home');

Route::prefix('/extra-pages')->group(function()
{
    Route::get('/{page}','ExtraPagesController@page')->name("extra");
});

Route::prefix('/products')->group(function()
{
    Route::get('/','ProductsController@index')->name("products");
    Route::get('/detail/{code}','ProductsController@detail')->name("products.detail");
});

Route::prefix('/admin')->group(function()
{
    Route::get('/','AdminController@index')->name('admin');
});
