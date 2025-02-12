<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->createBrands();
        $this->createCategories();
        $this->createProducts();

        // run CurrencySeeder
        $this->call(CurrencySeeder::class);
    }

    public function createBrands(): void
    {
        $brand_images = ['abt-1.jpg', 'abt-2.jpg', 'abt-3.jpg', 'seiko.png', 'diesel.png'];
        foreach ($brand_images as $image) {
            Brand::factory()->create([
                'img' => $image
            ]);
        }
    }

    public function createCategories(): void
    {
        Category::factory(20)->create();
    }

    public function createProducts(): void
    {
        $product_images = ['p-1.png', 'p-2.png', 'p-3.png', 'p-4.png', 'p-5.png', 'p-6.png', 'p-7.png', 'p-8.png'];
        foreach ($product_images as $image) {
            Product::factory()->create([
                'img' => $image
            ]);
        }
        Product::factory(100)->create();
    }
    
    public function createUsers(): void
    {
        User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@gmail.com',
            'password' => bcrypt('111111')
        ]);

        User::factory()->create([
            'name' => 'Ban Doe',
            'email' => 'ban@gmail.com',
            'password' => bcrypt('111111')
        ]);
    }
}
