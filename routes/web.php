<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WalletController;
use Illuminate\Support\Facades\Route;

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
Route::get('/', [ListingController::class, 'index']);

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

// Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Store User Data
Route::post('/users', [UserController::class, 'store']);

// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log User In
Route::post('/users/login', [UserController::class, 'authenticate']);

