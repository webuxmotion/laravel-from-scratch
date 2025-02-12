<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;

class MainController extends Controller
{
    public function index()
    {
        // get brands, limit 3
        $brands = Brand::limit(3)->get();

        // get hits products
        $hits = Product::where('hit', 1)->limit(8)->get();

        return view('main.index', [
            'brands' => $brands,
            'hits' => $hits,
        ]);
    }
}
