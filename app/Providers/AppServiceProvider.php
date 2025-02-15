<?php

namespace App\Providers;

use App\Services\CategoryService;
use App\Services\GlobalDataService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(GlobalDataService::class, function () {
            return new GlobalDataService();
        });

        $this->app->singleton(CategoryService::class, function () {
            return new CategoryService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(CategoryService $categoryService): void
    {
        if (Schema::hasTable('categories')) {
            // Get categories once and share globally
            $categories = $categoryService->getCategories();

            globalData()->setData('categories', $categories);
        }
        // Disable mass assignment protection
        Model::unguard();
    }
}
