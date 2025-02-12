<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // get all categories ids
        $category_ids = Category::pluck('id')->toArray();
        // get random id
        $category_id = fake()->randomElement($category_ids);

        // get all brands ids
        $brand_ids = Brand::pluck('id')->toArray();
        // get random id
        $brand_id = fake()->randomElement($brand_ids);

        $price = fake()->randomFloat(2, 1, 10000);
        // old_price must be more than price
        $old_price = fake()->randomFloat(2, $price, 10000);

        return [
            'category_id' => $category_id, // assuming a Category factory exists
            'brand_id' => $brand_id, // assuming a Brand factory exists
            'title' => fake()->words(3, true),
            'alias' => fake()->unique()->slug(),
            'content' => fake()->paragraph(),
            'price' => $price,
            'old_price' => $old_price,
            'status' => fake()->randomElement([0, 1]),
            'keywords' => fake()->words(5, true),
            'description' => fake()->sentence(),
            'img' => 'no_image.png',
            'hit' => fake()->randomElement([0, 1])
        ];
    }
}
