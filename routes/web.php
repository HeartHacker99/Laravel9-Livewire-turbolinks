<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\category;
use App\Http\Livewire\Admin\Products;
use App\Http\Livewire\Admin\Addsliders;
use App\Http\Livewire\Admin\sliders;
use App\Http\Livewire\Admin\Orders;
use App\Http\Livewire\Admin\Editslider;
use App\Http\Livewire\adminlayout\Dashboard;
use App\Http\Livewire\Client\Shop;
use App\Http\Livewire\Client\ShoppingCart;
use App\Http\Livewire\Client\Home;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\homeController;
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



Route::get('/', Home::class)->name('home');
Route::get('/shop', Shop::class)->name('shop');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function () {

    Route::group(['middleware' => 'role:client'], function () {
        Route::get('shoppingcart', ShoppingCart::class)->name('shoppingcart');
        Route::get('payment-cancel', [PaypalController::class, 'cancel'])->name('payment.cancel');
        Route::get('payment-success', [PaypalController::class, 'success'])->name('payment.success');
    });

    Route::group(['middleware' => 'role:admin'], function () {
        Route::get('/dashboard', Dashboard::class)->name('dashboard');
        Route::get('/category', category::class)->name('category');
        Route::get('/sliders', sliders::class)->name('sliders');
        Route::get('/addsliders', Addsliders::class)->name('addsliders');
        Route::get('/editslider/{sliderId}', Editslider::class);
        Route::get('/products', Products::class)->name('products');
        Route::get('/orders', Orders::class)->name('orders');
        Route::get('viewPdf/{id}', [homeController::class, 'viewPdf'])->name('viewPdf');

    });
});
