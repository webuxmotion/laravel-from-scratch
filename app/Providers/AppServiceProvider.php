<?php

namespace App\Providers;

use App\Services\GlobalDataService;
use Illuminate\Database\Eloquent\Model;
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
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Disable mass assignment protection
        Model::unguard();
    }
}
