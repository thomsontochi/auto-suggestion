<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Collection;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::all()->each(function ($user) {
            Collection::factory(5)->create(['user_id' => $user->id]);
        });
    }
}
