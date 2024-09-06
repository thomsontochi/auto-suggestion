<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SuggestionTerm>
 */
class SuggestionTermFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // return [
        //     'term' => $this->faker->words(2, true),
        //      'url' => $this->faker->url,
        // ];

        $suggestedTerms = [
            'popular products',
            'new arrivals',
            'flash sale',
            'clearance items',
            'top rated',
            'bestsellers',
            'eco-friendly',
            'limited edition',
            'exclusive deals',
            'trending now',
            'seasonal offers',
            'gift ideas',
            'bundle deals',
            'customer favorites',
            'daily specials',
            'last chance',
            'price drop',
            'free shipping',
            'back in stock',
            'pre-order now',
            'handmade crafts',
            'organic products',
            'tech gadgets',
            'home decor',
            'fashion accessories',
            'beauty essentials',
            'fitness gear',
            'kitchen appliances',
            'outdoor equipment',
            'kids toys',
            'pet supplies',
            'books and media',
            'electronics',
            'jewelry',
            'sports gear',
            'travel accessories',
            'sustainable products',
            'luxury items',
            'local artisans',
            'vintage collectibles',
            'DIY kits',
            'gourmet food',
            'health and wellness',
            'smart home devices',
            'educational resources',
            'party supplies',
            'automotive accessories',
            'musical instruments',
            'art supplies',
            'gardening tools'
        ];

        return [
            'term' => $this->faker->randomElement($suggestedTerms),
            'url' => $this->faker->url,
        ];
    }
}
