<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function relatedProducts()
    {
        return $this->hasMany(RelatedProduct::class, 'product_id')
            ->with('relatedProduct');
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }
}
