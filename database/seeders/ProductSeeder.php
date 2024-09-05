<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Collection;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Collection::all()->each(function ($collection) {
            Product::factory(20)->create([
                'user_id' => $collection->user_id,
                'collection_id' => $collection->id,
            ]);
        });
    }
}
