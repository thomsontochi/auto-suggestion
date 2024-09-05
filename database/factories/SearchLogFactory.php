<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SearchLog>
 */
class SearchLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // return [
        //     'term' => $this->faker->words(3, true),
        // ];
        $searchTerms = [
            'best running shoes',
            'affordable laptops',
            'summer dresses',
            'wireless earbuds',
            'organic skincare',
            'smart home devices',
            'hiking gear',
            'kitchen gadgets',
            'fitness trackers',
            'children\'s books'
        ];

        return [
            'term' => $this->faker->randomElement($searchTerms),
        ];
    }
}
