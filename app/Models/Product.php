<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cookie;

class Product extends Model
{
    use HasFactory;

    private $recently_cookie_key = 'recentlyViewed';

    public function setRecentlyViewed($id)
    {
        $commaSeparatedIds = $this->getAllRecentlyViewed();

        if (!$commaSeparatedIds) {
            // Встановлення cookie на 24 години (1440 хвилин)
            Cookie::queue($this->recently_cookie_key, $id, 1440);
        } else {
            // Перетворюємо рядок у масив
            $array = explode(',', $commaSeparatedIds);

            // Перевіряємо, чи не містить масив id
            if (!in_array($id, $array)) {
                // Додаємо id в масив
                $array[] = $id;
            }

            // Перетворюємо масив назад у рядок
            $string = implode(',', $array);

            Cookie::queue($this->recently_cookie_key, $string, 1440);
        }
    }

    public function getAllRecentlyViewed()
    {
        return Cookie::get($this->recently_cookie_key);
    }

    public function getRecentlyViewed()
    {
        $commaSeparatedIds = $this->getAllRecentlyViewed();

        if ($commaSeparatedIds) {
            $array = explode(',', $commaSeparatedIds);
            $mostRecentIds = array_slice($array, -3);
            $products = Product::whereIn('id', $mostRecentIds)->get();

            return $products;
        }
    }

    public function relatedProducts()
    {
        return $this->hasMany(RelatedProduct::class, 'product_id')
            ->with('relatedProduct');
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    public function modifications()
    {
        return $this->hasMany(Modification::class);
    }
}
