<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::all()->each(function ($user) {
        //     Setting::factory()->create([
        //         'user_id' => $user->id,
        //         'key' => 'display_suggestion_term',
        //         'value' => 'true',
        //     ]);
        //     Setting::factory()->create([
        //         'user_id' => $user->id,
        //         'key' => 'display_collection',
        //         'value' => 'true',
        //     ]);
        //     Setting::factory()->create([
        //         'user_id' => $user->id,
        //         'key' => 'display_product',
        //         'value' => 'true',
        //     ]);
        //     Setting::factory()->create([
        //         'user_id' => $user->id,
        //         'key' => 'max_results',
        //         'value' => '10',
        //     ]);
        // });

        User::all()->each(function ($user) {
            Setting::factory()->create([
                'user_id' => $user->id,
            ]);
        });
    }
}
