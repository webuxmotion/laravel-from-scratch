<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\RelatedProduct;
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

        $this->createRelatedProducts();
        $this->createGalleries();
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
        Category::factory(5)->create([
            'parent_id' => null
        ]);

        $cats = Category::factory(3)->create([
            'parent_id' => 4
        ]);

        Category::factory(3)->create([
            'parent_id' => $cats[1]->id
        ]);
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

        Product::orderBy('id')->first()?->update(['hit' => 1]);
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

    public function createRelatedProducts(): void
    {
        // Get all products
        $products = Product::all();

        // For each product, attach 3 random related products
        foreach ($products as $product) {
            // Get 3 random products excluding the current one
            $relatedProducts = Product::where('id', '!=', $product->id)
                ->inRandomOrder()
                ->limit(3)
                ->get();

            // Seed related products
            foreach ($relatedProducts as $related) {
                RelatedProduct::create([
                    'product_id' => $product->id,
                    'related_product_id' => $related->id,
                ]);
            }
        }
    }

    public function createGalleries()
    {
        $images = ['exo-1.png', 'exo-2.png', 'exo-3.png'];

        foreach ($images as $image) {
            Gallery::create([
                'product_id' => 1,
                'img' => $image
            ]);
        }
    }
}
