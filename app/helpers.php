<?php

use App\Services\GlobalDataService;

if (! function_exists('getImageLink')) {
    function getImageLink($imageFromDb) {
        $image = $imageFromDb ? asset('storage/' . $imageFromDb) : asset('images/no-image.png');

        return $image;
    }
}

if (!function_exists('globalData')) {
    /**
     * Helper to access the GlobalDataService singleton.
     *
     * @return GlobalDataService
     */
    function globalData($key = '')
    {
        $instance = app(GlobalDataService::class);

        if ($key) {
            return $instance->get($key);
        }

        return $instance;
    }
}

if (!function_exists('getCurr')) {
    
    function getCurr()
    {
        return globalData()->getData()['selectedCurrency'];
    }
}

if (!function_exists('showPrice')) {
    
    function showPrice($price)
    {
        return number_format($price, 2, '.', '');
    }
}
