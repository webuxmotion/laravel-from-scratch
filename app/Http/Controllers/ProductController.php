<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        $this->setMeta("Product: " . $product->title, $product->description, $product->keywords);

        $product->setRecentlyViewed($product->id);

        $category = globalData()
            ->get('categories')
            ->firstWhere('id', $product->category_id);

        $relatedProducts = $product->relatedProducts->pluck('relatedProduct');

        $gallery = $product->galleries->isEmpty()
            ? null
            : $product->galleries->pluck('img');

        $recentlyViewed = $product->getRecentlyViewed();

        $mods = $product->modifications;

        return view('products.show', [
            'product' => $product,
            'category' => $category,
            'related' => $relatedProducts,
            'gallery' => $gallery,
            'recently' => $recentlyViewed,
            'mods' => $mods,
            'curr' => getCurr()
        ]);
    }
}
