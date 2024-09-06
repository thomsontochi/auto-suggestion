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
            'children\'s books',
            'budget travel tips',
            'eco-friendly products',
            'home workout equipment',
            'gourmet coffee makers',
            'pet supplies',
            'gaming consoles',
            'travel accessories',
            'online courses',
            'DIY home improvement',
            'smartphones under 500',
            'vegan recipes'
        ];
        
        return [
            'term' => $this->faker->randomElement($searchTerms),
        ];
    }
}
