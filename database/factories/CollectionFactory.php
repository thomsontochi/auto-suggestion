<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Collection>
 */
class CollectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // return [
        //     'title' => $this->faker->words(3, true),
        //      'url' => $this->faker->url,
        // ];
        $collectionTypes = ['Summer', 'Winter', 'Spring', 'Fall', 'Holiday', 'Casual', 'Formal', 'Sports', 'Outdoor', 'Indoor'];
        $productCategories = ['Clothing', 'Accessories', 'Electronics', 'Home Decor', 'Kitchenware', 'Beauty', 'Fitness', 'Books', 'Toys', 'Furniture'];

        return [
            'title' => $this->faker->randomElement($collectionTypes) . ' ' . $this->faker->randomElement($productCategories) . ' Collection',
            'url' => $this->faker->url,
        ];
    }
}
