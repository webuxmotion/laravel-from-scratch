<?php

use App\Models\Wallet;
use Illuminate\Support\Facades\Route;

Route::get('/posts', function () {
    return response()->json([
        'posts' => [
            [
                'title' => 'Post One'
            ]
        ]
    ]);
});

// return all wallets
Route::get('/wallets', function () {
    return response()->json(Wallet::all());
});
