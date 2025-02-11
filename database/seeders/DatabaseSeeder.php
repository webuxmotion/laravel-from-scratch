<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Listing;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@gmail.com',
            'password' => bcrypt('111111')
        ]);

        Listing::factory(3)->create([
            'user_id' => $user->id
        ]);

        $user2 = User::factory()->create([
            'name' => 'Ban Doe',
            'email' => 'ban@gmail.com',
            'password' => bcrypt('111111')
        ]);
        
        Listing::factory(3)->create([
            'user_id' => $user2->id
        ]);

        $brand_images = ['abt-1.jpg', 'abt-2.jpg', 'abt-3.jpg', 'seiko.png', 'diesel.png'];
        foreach ($brand_images as $image) {
            Brand::factory()->create([
                'img' => $image
            ]);
        }

        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Listing::create([
        //     'title' => 'Laravel Senior Developer', 
        //     'tags' => 'laravel, javascript',
        //     'company' => 'Acme Corp',
        //     'location' => 'Boston, MA',
        //     'email' => 'email1@email.com',
        //     'website' => 'https://www.acme.com',
        //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
        // ]);
    }
}
