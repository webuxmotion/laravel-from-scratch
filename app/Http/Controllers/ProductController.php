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

    public function categoryProducts($alias)
    {
        $category = globalData()
            ->get('categories')
            ->firstWhere('alias', $alias);

        if (!$category) {
            abort(404);
        }

        // Get all child category IDs
        $categoryIds = $this->getCategoryWithChildrenIds($category->id);

        // Get products from the category and its children
        $products = Product::whereIn('category_id', $categoryIds)
            ->paginate(4);

        return view('products.category', [
            'category' => $category,
            'products' => $products,
            'curr' => getCurr()
        ]);
    }

    /**
     * Recursively get all child category IDs.
     */
    private function getCategoryWithChildrenIds($parentId)
    {
        $categories = globalData()->get('categories');

        // Start with the current category
        $ids = [$parentId];

        // Find all children of the current category
        $children = $categories->where('parent_id', $parentId);

        foreach ($children as $child) {
            // Recursively get subcategories
            $ids = array_merge($ids, $this->getCategoryWithChildrenIds($child->id));
        }

        return $ids;
    }
}
