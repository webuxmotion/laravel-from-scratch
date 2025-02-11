<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // company title
        $title = fake()->company;

        return [
            'title' => $title, // Використовуємо fake()-> для генерації випадкових даних
            'alias' => Str::slug($title), // Створюємо alias через slug
            'img' => 'brand_no_image.jpg', // Стандартне значення для картинки
            'description' => fake()->paragraph, // Генеруємо випадковий опис
        ];
    }
}
