<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use App\Models\Category;

class CategoryService
{
    public $cacheKey = 'global_categories';

    // Get categories from cache or database
    public function getCategories()
    {
        $categories = Cache::get('categories');

        if (!$categories) {
            // Якщо кеш порожній, оновлюємо його
            $categories = Category::all();
            Cache::put($this->cacheKey, $categories, 60);
        }

        return $categories;
    }

    // Clear cache if needed (e.g., after category updates)
    public function clearCache()
    {
        Cache::forget($this->cacheKey);
    }
}