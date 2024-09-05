<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\SettingSeeder;
use Database\Seeders\SearchLogSeeder;
use Database\Seeders\CollectionSeeder;
use Database\Seeders\SuggestionTermSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            UserSeeder::class,
            CollectionSeeder::class,
            ProductSeeder::class,
            SuggestionTermSeeder::class,
            SettingSeeder::class,
            SearchLogSeeder::class,
        ]);
    }
}
