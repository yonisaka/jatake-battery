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
Route::get('/term-condition', 'HomeController@term_condition')->name('home');
// Route::get('/mobil', 'HomeController@showProductByType');
Route::get('/search', 'HomeController@search');

Route::prefix('/')->name('home.')->group(function()
{
    Route::prefix('brands')->name('brands.')->group(function(){
        Route::get('{type}', 'Home\BrandsControl@showBrandByType')->name('type');
        Route::post('create','Home\BrandsControl@create')->name('create');
    });

    Route::apiResource('brands','Home\BrandsControl');

    Route::prefix('products')->name('products.')->group(function(){
        Route::get('brand/{brand_id}/{type}', 'Home\ProductsControl@showProductByBrandAndType')->name('brand.type');
        Route::get('brand/{brand_id}', 'Home\ProductsControl@showProductByBrand')->name('brand');
        // Route::post('create','Home\ProductsControl@create')->name('create');
        Route::post('store_reviews','Home\ProductsControl@storeReviews')->name('store-reviews');
    });

    Route::apiResource('products','Home\ProductsControl');
});

Route::prefix('/extra-pages')->group(function()
{
    Route::get('/{page}','ExtraPagesController@page')->name("extra");
});


// Route::prefix('/products')->group(function()
// {
//     Route::any('/json/{function}','ProductsController@json');
//     Route::any('/json/{function}/{id}','ProductsController@json');
// });

Route::prefix('/admin')->name('admin.')->group(function()
{
    Route::get('/','AdminController@index');
    Route::get('login','AdminController@login')->name('login');
    Route::post('login','AdminController@request_login')->name('req_login');
    Route::get('logout','AdminController@logout')->name('logout');


    Route::prefix('products')->name('products.')->group(function(){
        Route::post('create','Admin\ProductsControl@create')->name('create');
        Route::get('old','Admin\ProductsControl@old')->name('old');
    });

    Route::apiResource('products','Admin\ProductsControl');

    Route::prefix('brands')->name('brands.')->group(function(){
        Route::post('create','Admin\BrandsControl@create')->name('create');
    });

    Route::apiResource('brands','Admin\BrandsControl');
});

// Route::apiResource('/admin', 'AdminController');
