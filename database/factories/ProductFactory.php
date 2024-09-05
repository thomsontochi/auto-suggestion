<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // return [
        //     'title' => $this->faker->words(4, true),
        //     'url' => $this->faker->url,
        //     'brand' => $this->faker->company,
        //     'price' => $this->faker->randomFloat(2, 10, 1000),
        //     'image' => $this->faker->imageUrl(),
        // ];

        $brands = ['Nike', 'Adidas', 'Apple', 'Samsung', 'IKEA', 'H&M', 'Zara', 'Sony', 'LG', 'Amazon Basics'];
        $productTypes = ['T-shirt', 'Jeans', 'Sneakers', 'Smartphone', 'Laptop', 'Sofa', 'Lamp', 'Watch', 'Headphones', 'Backpack'];

        return [
            'title' => $this->faker->randomElement($brands) . ' ' . $this->faker->randomElement($productTypes),
            'url' => $this->faker->url,
            'brand' => $this->faker->randomElement($brands),
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'image' => $this->faker->imageUrl(),
        ];
    }
}
