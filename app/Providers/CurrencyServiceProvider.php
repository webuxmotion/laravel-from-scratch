<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Currency;
use Illuminate\Support\Facades\Schema;

class CurrencyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        if (Schema::hasTable('currencies')) {
            $currencies = Currency::orderBy('base', 'desc')->get();

            $selectedCurrencyCode = isset($_COOKIE['currency']) ? htmlspecialchars($_COOKIE['currency']) : 'USD';
            $selectedCurrency = $currencies->firstWhere('code', $selectedCurrencyCode);

            if (!$selectedCurrency) {
                $selectedCurrency = $currencies->firstWhere('code', 'USD');
            }

            $globalData = globalData();

            $globalData->setData('currencies', $currencies);
            $globalData->setData('selectedCurrency', $selectedCurrency);
        }
    }
}
