<?php

use App\Livewire\CreateProduct;
use App\Livewire\EditProduct;
use App\Livewire\ListProducts;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return redirect('/register');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {


    //Route::get('/',ListProducts::class );;


    Route::get('/',ListProducts::class )->name('products.list');
    Route::get('/products/create',CreateProduct::class)->name('products.create');
    Route::get('/products/{product}/edit',EditProduct::class)->name('products.edit');
    
    
    // --TODO--: Add the following routes: -Yazan
    // Route::get('/categories', function () {return view('categories.index');})->name('categories.index');
    // Route::get('/categories/create', function () {
    //     return view('categories.create');
    // })->name('categories.create');
    // Route::get('/categories/{category}/edit', function () {
    //     return view('categories.edit');
    // })->name('categories.edit');
    // Route::get('/customers', function () {
    //     return view('customers.index');
    // })->name('customers.index');
    // Route::get('/customers/create', function () {
    //     return view('customers.create');
    // })->name('customers.create');
    // Route::get('/customers/{customer}/edit', function () {
    //     return view('customers.edit');
    // })->name('customers.edit');


});
