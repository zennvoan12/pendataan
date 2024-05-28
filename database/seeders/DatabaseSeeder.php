<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Alumni;
use App\Models\Galery;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Activity;
use Illuminate\Database\Seeder;
use Database\Factories\ActivityFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Alumni::factory(10)->create();

        Activity::factory(10)->create();

        Galery::factory(10)->create();
    }
}
