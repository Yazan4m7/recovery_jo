<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\api\CartController;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
//Route::get('/z',[CartController::class,'store']);
//Route::get('login', [AuthController::class, 'login']);
//Route::post('zzz', [AuthController::class, 'signup']);
//Route::controller(AuthController::class)->group(function () {
    // Route::get('test', function(){
    //     return "Hello World!";
    // });

    //     Route::apiResource('carts', App\Http\Controllers\CartController::class)->except(['update', 'index']);
    //     // Route::apiResource('orders', 'OrderController')->except(['update', 'destroy','store'])->middleware('auth:api');
    //      Route::post('/carts/{cart}', [CartController::class,'addProducts']);
    //      Route::post('/carts/{cart}/checkout', 'CartController@checkout');
    
//});
// Route::group(['prefix' => 'API/auth'], function () {

    // Route::post('login', [AuthController::class, 'login']);
    // Route::post('signup', 'AuthController@signup');

    // Route::group(['middleware' => 'auth:api'], function () {
    //     Route::get('logout', 'AuthController@logout');
    // });

// });

Route::group(['prefix' => 'v1'], function () {
Route::apiResource('products', 'App\Http\Controllers\api\ProductController')->except(['update', 'store', 'destroy']);
Route::apiResource('carts', 'App\Http\Controllers\api\CartController')->except(['update', 'index']);
Route::apiResource('orders', 'App\Http\Controllers\api\OrderController')->except(['update', 'destroy','store'])->middleware('auth:api');

Route::post('/carts/{cart}', [CartController::class,"addProducts"]);
Route::post('/carts/{cart?}/checkout', [CartController::class,"checkout"]);


Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class, "login"]);
    Route::post('signup',[AuthController::class,"signup"] );
  

    // logout only when you're logged in
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('logout', 'AuthController@logout');
    });

});
});
