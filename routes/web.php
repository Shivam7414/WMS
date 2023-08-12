<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
    return redirect('login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::get('dashboard', 'DashboardController@index');
    Route::get('profile','ProfileController@index');

    Route::post('store','ProfileController@store');

    Route::group(['prefix' => 'customer', 'as' => 'customer'], function() {
        Route::get('index', 'CustomerController@index');
        Route::get('edit','CustomerController@edit');

        Route::post('store','CustomerController@store');
        Route::post('delete','CustomerController@delete');

        Route::group(['prefix' => 'in_item', 'as' => 'item'], function() {
            Route::get('{customer_id}/index', 'InItemController@index');
            Route::get('add', 'InItemController@edit');
            Route::get('edit', 'InItemController@edit');

            Route::post('store','InItemController@store');
            Route::post('delete','InItemController@delete');
        });
        Route::group(['prefix' => 'out_item', 'as' => 'item'], function() {
            Route::get('add', 'OutItemController@edit');
            Route::get('edit', 'OutItemController@edit');

            Route::post('store','OutItemController@store');
            Route::post('delete','OutItemController@delete');
        });
    });
});
