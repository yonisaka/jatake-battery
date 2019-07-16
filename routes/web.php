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

Route::resource('/products','ProductsController')->except(['create','edit']);
Route::prefix('/products')->group(function()
{
    Route::any('/json/{function}','ProductsController@json');
    Route::any('/json/{function}/{id}','ProductsController@json');
});


Route::prefix('/admin')->group(function()
{
    Route::get('/','AdminController@index');
    Route::get('/login','AdminController@login');
});

Route::middleware(function($req,$next){
    echo "this is API";
    return $next($req);
})->prefix('/api')->group(function()
{
    Route::apiResource('/products','Api\ProductsApi');
});
