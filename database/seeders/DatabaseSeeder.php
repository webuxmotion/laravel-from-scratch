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
        $product_images = ['p1.png', 'p2.png', 'p3.png', 'p4.png', 'p5.png', 'p6.png', 'p7.png', 'p8.png'];
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
