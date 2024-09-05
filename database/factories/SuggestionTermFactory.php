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
            'trending now'
        ];

        return [
            'term' => $this->faker->randomElement($suggestedTerms),
            'url' => $this->faker->url,
        ];
    }
}
