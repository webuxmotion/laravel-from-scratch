<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        $this->setMeta("Product: " . $product->title, $product->description, $product->keywords);

        return view('products.show', [
            'product' => $product,
            'curr' => getCurr()
        ]);
    }
}
