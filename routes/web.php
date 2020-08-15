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
Auth::routes();

Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::middleware('auth')->group(function(){
    Route::get('/', 'HomeController@home')->name('home');

    Route::get('/setting', 'Auth\SettingController@setting')->name('setting');
    Route::post('/setting', 'Auth\SettingController@save');

    Route::resource('product', 'ProductController')->middleware('admin')->names('product');
    Route::get('product-customer', 'ProductCustomerController@index')->name('product_customer');
    Route::post('product-customer', 'ProductCustomerController@save');

    Route::prefix('dashboard')->as('dashboard.')->group(function (){
        Route::get('non_selected', 'DashboardController@nonSelected')->name('non_selected');
        Route::get('count_active_products', 'DashboardController@countActiveProducts')->name('count_active_products');
        Route::get('summarized_prices_products', 'DashboardController@summarizedPricesProducts')->name('summarized_prices_products');
    });

});
