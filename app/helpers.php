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
    function globalData(): GlobalDataService
    {
        return app(GlobalDataService::class);
    }
}