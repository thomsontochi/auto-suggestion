<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Setting>
 */
class SettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // return [
        //     'key' => $this->faker->randomElement(['theme', 'language', 'notifications', 'privacy']),
        //     'value' => $this->faker->randomElement(['light', 'dark', 'en', 'es', 'enabled', 'disabled', 'public', 'private']),
        // ];

        return [
            'display_suggestion_term' => $this->faker->boolean,
            'display_collection' => $this->faker->boolean,
            'display_product' => $this->faker->boolean,
            'max_results' => $this->faker->numberBetween(1, 50),
            'min_characters' => $this->faker->numberBetween(1, 5),
            'search_delay' => $this->faker->numberBetween(100, 1000),
            'enable_fuzzy_search' => $this->faker->boolean,
        ];
    }
}
