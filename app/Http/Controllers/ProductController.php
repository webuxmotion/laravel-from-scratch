<?php

namespace App\Http\Controllers;

use App\Models\AttributeGroup;
use App\Models\Product;
use App\View\Components\Filter;

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

        $attributes = $product->attributeProducts->map(function ($item) {
            return (object) [
                'attribute' => $item->attributeValue?->attributeGroup?->title ?? 'Unknown', // Назва групи атрибутів
                'value' => $item->attributeValue?->value ?? 'No Value', // Значення атрибута
            ];
        });

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
            'attributes' => $attributes,
            'mods' => $mods,
            'curr' => getCurr()
        ]);
    }

    public function categoryProducts($alias)
    {
        $category = globalData()
            ->get('categories')
            ->firstWhere('alias', $alias);

        if ($alias !== 'all') {
            if (!$category) {
                abort(404);
            }
        }

        // if $category null
        if (!$category) {
            $category = (object) [
                'title' => 'All products',
                'description' => 'All products',
                'keywords' => 'All products'
            ];
        }

        $curr = getCurr();

        if ($alias == 'all') {
            $products = Product::query();
        } else {
            // Get all child category IDs
            $categoryIds = $this->getCategoryWithChildrenIds($category->id);
            $products = Product::whereIn('category_id', $categoryIds);
        }

        $filter = Filter::getFilter();
        $filterIds = $filter ? explode(',', $filter) : null;

        // if (!empty($filterIds)) {
        //     $products->whereHas('attributeProducts', function ($query) use ($filterIds) {
        //         $query->whereIn('attribute_value_id', $filterIds);
        //     }, '=', count($filterIds));
        // }

        $groups = AttributeGroup::with('attributeValues')->get();

        $mappedFilters = [];

        // Loop through groups
        foreach ($groups as $group) {
            // Get attribute values that belong to this group and are in $filterIds
            $filteredValues = collect($group->attributeValues)
                ->whereIn('id', $filterIds)
                ->pluck('value') // Get only values
                ->toArray();

            if (!empty($filteredValues)) {
                $mappedFilters[$group['title']] = $filteredValues;
            }
        }

        //dd($mappedFilters);

        if (!empty($mappedFilters)) {
            $products->whereHas('attributeProducts', function ($query) use ($mappedFilters) {
                foreach ($mappedFilters as $group => $values) {
                    $query->whereHas('attributeValue', function ($subQuery) use ($group, $values) {
                        $subQuery->whereHas('attributeGroup', function ($groupQuery) use ($group) {
                            $groupQuery->where('title', $group);
                        })->whereIn('value', $values);
                    });
                }
            });
        }

        // if ajax request
        if (request()->ajax()) {
            $products = $products->paginate(8, ['*'], 'page', 1)->appends(request()->query());  // Forces page 1

            return response()->view('products.partials.product-list', compact('products', 'category', 'curr'))
                ->header("Cache-Control", "no-store, no-cache, must-revalidate, max-age=0")
                ->header("Pragma", "no-cache")
                ->header("Expires", "Fri, 01 Jan 1990 00:00:00 GMT");
        }

        $products = $products->paginate(8)->appends(request()->query());

        return view('products.category', compact('products', 'category', 'curr'));
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
