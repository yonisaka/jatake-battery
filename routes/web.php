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

Route::get('/', 'Home@index')->name('home');

Route::prefix('/extra-pages')->group(function()
{
    Route::get('/{page}','ExtraPages@page')->name("extra");
});

Route::prefix('/products')->group(function()
{
    Route::get('/{page}','Products@page')->name("extra");
});
