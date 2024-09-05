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
        //     'key' => $this->faker->word,
        //     'value' => $this->faker->word,

        // ];

        return [
            'key' => $this->faker->randomElement(['theme', 'language', 'notifications', 'privacy']),
            'value' => $this->faker->randomElement(['light', 'dark', 'en', 'es', 'enabled', 'disabled', 'public', 'private']),
        ];
    }
}
