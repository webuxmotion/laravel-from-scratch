<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // array with 3 currencies (USD, UAH, EUR) with title, code, symbol_left, symbol_right, value, base
        $currencies = [
            [
                'title' => 'US Dollar',
                'code' => 'USD',
                'symbol_left' => '$',
                'symbol_right' => '',
                'value' => 1,
                'base' => 1,
            ],
            [
                'title' => 'Ukrainian Hryvnia',
                'code' => 'UAH',
                'symbol_left' => '₴',
                'symbol_right' => '',
                'value' => 41.84,
                'base' => 0,
            ],
            [
                'title' => 'Euro',
                'code' => 'EUR',
                'symbol_left' => '€',
                'symbol_right' => '',
                'value' => 0.96,
                'base' => 0,
            ],
        ];

        // insert currencies to the database
        foreach ($currencies as $currency) {
            Currency::create($currency);
        }
    }
}
