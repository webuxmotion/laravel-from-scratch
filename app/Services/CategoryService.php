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
        return Cache::remember($this->cacheKey, now()->addHours(24), function () {
            return Category::all();
        });
    }

    // Clear cache if needed (e.g., after category updates)
    public function clearCache()
    {
        Cache::forget($this->cacheKey);
    }
}