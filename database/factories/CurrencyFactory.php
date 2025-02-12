<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Currency>
 */
class CurrencyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->currencyCode(), // Random currency title
            'code' => fake()->unique()->currencyCode(), // Unique 3-letter currency code
            'symbol_left' => fake()->boolean() ? fake()->randomElement(['$', '€', '£', '¥', '₴']) : '', // Random left symbol or empty
            'symbol_right' => fake()->boolean() ? fake()->randomElement(['$', '€', '£', '¥', '₴']) : '', // Random right symbol or empty
            'value' => fake()->randomFloat(2, 0.01, 100), // Random exchange rate
            'base' => 0, // 0 or 1 for base currency
        ];
    }
}
