<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//add new 2
Route::post('/payment', 'payment\PaymentController@paymentcomplete');

Route::post('/payment-response', 'payment\PaymentController@paymentresponse');

Route::get('/payment-phone/{phone}/{email}', 'payment\PaymentController@payment_phone');

Route::get('/payment-inactive/{id}/{phone}/{email}', 'payment\PaymentController@payment_inactive');


Route::get('/user-active/{id}', 'payment\PaymentController@useractive');