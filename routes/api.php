<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->group(function () {
    Route::get('user', 'Api\UserController@details');
    Route::post('transaction', 'Api\TransactionController@add');
});

Route::post('login', 'Api\UserController@login')->name('login');

Route::fallback('DefaultController@fallback')->name('fallback');