<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Blog;
use App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Blog::factory(30)->create();
        Category::factory(5)->create();
        $defaultCategory = Category::firstOrCreate(
            ['name' => 'Uncategorized'],
            ['slug' => 'uncategorized']
        );
        // User::create([
        //     'name' => 'admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => bcrypt('admin123'),
        // ]);

        User::create([
            'name' => 'Zennovan',
            'username' => 'zennovan',
            'email' => 'zennovan@gmail.com',
            'password' => bcrypt('admin123'),
        ]);



        // Category::create([
        //     'name' => 'Technology',
        //     'slug' => 'technology',
        // ]);

        // Category::create([
        //     'name' => 'Web Development',
        //     'slug' => 'web-development',

        // ]);

        // Category::create([
        //     'name' => 'Lifestyle',
        //     'slug' => 'lifestyle',
        // ]);

    }
}
