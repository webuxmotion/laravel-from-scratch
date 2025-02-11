<?php

namespace App\Http\Controllers;

use App\Models\Brand;

class MainController extends Controller
{
    public function index()
    {
        // get brands, limit 3
        $brands = Brand::limit(3)->get();

        return view('main.index', [
            'brands' => $brands
        ]);
    }
}
