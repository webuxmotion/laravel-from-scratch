<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('listings', [
        'heading' => 'Latest Listings',
        'listings' => [
            [
                'id' => 1,
                'title' => "Listing One",
                'description' => "Some dummy text, description 1"
            ],
            [
                'id' => 2,
                'title' => "Listing Two",
                'description' => "Some dummy text, description 2"
            ]
        ]
    ]);
});

Route::get('hello', function() {
    return response("<h1>Hello world!</h1>", 200)
        ->header('Content-Type', 'text/plain')
        ->header('foo', 'bar');
});

Route::get('/posts/{id}', function($id) {
    ddd($id);
    return response('Post ' . $id);
})->where('id', '[0-9]+');

Route::get('/search', function(Request $request) {
    dd($request->name . " from " . $request->city);
});