<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $faker = \Faker\Factory::create('id_ID');

        User::create([
            "username" => $faker->userName(),
            "email" => $faker->email(),
            "password" => bcrypt('password'),
        ]);

        Category::create([
            "category" => "Makanan",
            "description" => "Makanan Enak",
        ]);

        Product::create([
            "name" => "Bakso",
            "description" => "Bakso Enak",
            "price" => 10000,
            "stock" => 10,
            "image" => "https://www.masakapahariini.com/wp-content/uploads/2019/04/resep-bakso-sapi-1.jpg",
            // get user id and category id from database
            "user_id" => User::first()->id,
            "category_id" => Category::first()->id,
        ]);
    }
}
