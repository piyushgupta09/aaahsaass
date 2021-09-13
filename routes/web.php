<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckoutController;

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
    return view('app.home');
});

Route::get('/home', function () {
    return view('app.home');
})->name('home');

Route::get('/profile', function () {
    return view('app.users.profile');
})->middleware('verified');

Route::name('checkout.')->prefix('checkout')->group(function () {
    // GET|HEAD | checkout/checkout         | checkout.show    | App\Checkout@showCheckout   | web
    // POST     | checkout/checkout         | checkout.process | App\Checkout@processCheckout| web
    // POST     | checkout/checkout-cancel  | checkout.cancel  | App\Checkout@cancel         | web
    // POST     | checkout/checkout-success | checkout.success | App\Checkout@success        | web
    Route::get('/', [CheckoutController::class, 'show'])->name('show');
    Route::post('/', [CheckoutController::class, 'process'])->name('process');
    Route::post('/response', [CheckoutController::class, 'response'])->name('response');
});
