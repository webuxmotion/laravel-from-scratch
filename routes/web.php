<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\WalletController;
use App\Models\Cart;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

require base_path('routes/user.php');

Route::get('/input-search', [SearchController::class, 'inputSearch']);
Route::get('/search', [SearchController::class, 'search']);

Route::get('/products/{product:alias}', [ProductController::class, 'show'])
    ->name('products.show');

// category products
Route::get('/category/{category:alias}', [ProductController::class, 'categoryProducts'])
    ->name('category.show');

/* WALLETS */
// Show Wallets
Route::get('/wallets', [WalletController::class, 'index']);

// Show Create Form
Route::get('/wallets/create', [WalletController::class, 'create']);

// Store Wallet Data
Route::post('/wallets', [WalletController::class, 'store']);

// Show Edit Form
Route::get('/wallets/{wallet}', [WalletController::class, 'edit']);

// Update Wallet Data
Route::put('/wallets/{wallet}', [WalletController::class, 'update']);


// Show Listings
Route::get('/', [MainController::class, 'index'])->name('home');;

// Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');


// Show Create Form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// Store Listing Data
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

// Show Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// Update Listing Data
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

// Delete Listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

// Show Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

/* USER */


Route::post('/change-currency', function (Request $request) {
    $currency = $request->currency;

    setcookie('currency', $currency, time()+3600);
    Cart::recalc($currency);
    
    return back();
})->name('currency.change');

Route::post('/cart/add', [CartController::class, 'add']);
Route::delete('/cart/delete', [CartController::class, 'delete'])->name('cart.delete');
// clear cart
Route::delete('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::get('/cart/show', [CartController::class, 'show'])->name('cart.show');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::get('/cart/success', [CartController::class, 'success'])->name('cart.success');
