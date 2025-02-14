<?php

namespace Database\Factories;

use App\Models\RelatedProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

class RelatedProductFactory extends Factory
{
    protected $model = RelatedProduct::class;

    public function definition()
    {
        return [
            'product_id' => 1,
            'related_product_id' => 2,
        ];
    }
}