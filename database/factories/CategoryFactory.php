<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->unique()->word();
        $alias = Str::slug($title);
        
        // Check if alias exists and increment if necessary
        $count = Category::where('alias', 'like', "{$alias}%")->count();
        if ($count > 0) {
            $alias = "{$alias}-" . ($count + 1); // Increment number if alias exists
        }

        return [
            'title' => $title,
            'alias' => $alias,
            'parent_id' => fake()->boolean(50) ? Category::factory() : null,
            'keywords' => fake()->words(5, true),
            'description' => fake()->paragraph(),
        ];
    }
}
