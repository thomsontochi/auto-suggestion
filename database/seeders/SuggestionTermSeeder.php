<?php

namespace Database\Seeders;

use App\Models\SuggestionTerm;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SuggestionTermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SuggestionTerm::factory(100)->create();
    }
}
