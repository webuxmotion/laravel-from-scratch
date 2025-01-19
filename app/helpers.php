<?php

if (! function_exists('getImageLink')) {
    function getImageLink($imageFromDb) {
        $image = $imageFromDb ? asset('storage/' . $imageFromDb) : asset('images/no-image.png');

        return $image;
    }
}