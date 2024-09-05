<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\SearchLog;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SearchLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::all()->each(function ($user) {
            SearchLog::factory(50)->create(['user_id' => $user->id]);
        });
    }
}
