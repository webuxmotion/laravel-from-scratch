<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        $this->setMeta("Product: " . $product->title, $product->description, $product->keywords);

        $category = globalData()
            ->get('categories')
            ->firstWhere('id', $product->category_id);

        $relatedProducts = $product->relatedProducts->pluck('relatedProduct');

        return view('products.show', [
            'product' => $product,
            'curr' => getCurr(),
            'category' => $category,
            'related' => $relatedProducts
        ]);
    }
}
