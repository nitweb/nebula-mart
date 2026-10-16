<?php

use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\FlashDealController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductController as StorefrontProductController;
use App\Http\Controllers\Frontend\ShopController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/flash-deals', [FlashDealController::class, 'index'])->name('flash-deals');
Route::get('/category/{category:slug}', [ShopController::class, 'category'])->name('category.show');
Route::get('/brand/{brand:slug}', [ShopController::class, 'brand'])->name('brand.show');
Route::get('/product/{product:slug}', [StorefrontProductController::class, 'show'])->name('product.show');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::prefix('cart')->as('cart.')->middleware('throttle:120,1')->group(function () {
    Route::get('summary', [CartController::class, 'summary'])->name('summary');
    Route::post('items', [CartController::class, 'store'])->name('items.store');
    Route::patch('items/{key}', [CartController::class, 'update'])->where('key', '\d+-\d+')->name('items.update');
    Route::delete('items/{key}', [CartController::class, 'destroy'])->where('key', '\d+-\d+')->name('items.destroy');
    Route::delete('/', [CartController::class, 'clear'])->name('clear');
    Route::post('coupon', [CartController::class, 'applyCoupon'])->name('coupon.apply');
    Route::delete('coupon', [CartController::class, 'removeCoupon'])->name('coupon.remove');
    Route::put('zone', [CartController::class, 'zone'])->name('zone');
});

Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout.show');
Route::post('/checkout', [CheckoutController::class, 'store'])->middleware('throttle:10,1')->name('checkout.store');
Route::get('/order/success/{number}', [CheckoutController::class, 'success'])->where('number', 'NM-\d+')->name('checkout.success');

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
