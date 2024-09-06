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
        
        // $collectionTypes = ['Summer', 'Winter', 'Spring', 'Fall', 'Holiday', 'Casual', 'Formal', 'Sports', 'Outdoor', 'Indoor'];
        // $productCategories = ['Clothing', 'Accessories', 'Electronics', 'Home Decor', 'Kitchenware', 'Beauty', 'Fitness', 'Books', 'Toys', 'Furniture'];

        $collectionTypes = [
            'Summer', 'Winter', 'Spring', 'Fall', 'Holiday', 'Casual', 'Formal', 'Sports', 'Outdoor', 'Indoor',
            'Vintage', 'Modern', 'Luxury', 'Budget-Friendly', 'Eco-Friendly', 'Limited Edition', 'Exclusive',
            'Handcrafted', 'Trending', 'Classic', 'Bohemian', 'Minimalist', 'Rustic', 'Urban', 'Retro',
            'Futuristic', 'Sustainable', 'Organic', 'Artisanal', 'Tech-Savvy'
        ];
    
        $productCategories = [
            'Clothing', 'Accessories', 'Electronics', 'Home Decor', 'Kitchenware', 'Beauty', 'Fitness', 'Books', 'Toys', 'Furniture',
            'Jewelry', 'Footwear', 'Gadgets', 'Stationery', 'Gardening', 'Pet Supplies', 'Art', 'Craft Supplies', 'Automotive',
            'Travel Gear', 'Gourmet Food', 'Wellness', 'Outdoor Gear', 'Musical Instruments', 'Party Supplies',
            'Baby Products', 'Office Supplies', 'Sports Equipment', 'Cameras', 'Watches'
        ];
    
        $collectionAdjectives = [
            'Essential', 'Premium', 'Signature', 'Deluxe', 'Ultra', 'Elite', 'Pro', 'Compact', 'Innovative', 'Timeless',
            'Sleek', 'Vibrant', 'Elegant', 'Durable', 'Smart', 'Cozy', 'Chic', 'Trendsetting', 'Versatile', 'Luxurious'
        ];
    
        $titleFormats = [
            // Format 1: [Type] [Category] Collection
            fn() => $this->faker->randomElement($collectionTypes) . ' ' . $this->faker->randomElement($productCategories) . ' Collection',
            
            // Format 2: [Adjective] [Category] Collection
            fn() => $this->faker->randomElement($collectionAdjectives) . ' ' . $this->faker->randomElement($productCategories) . ' Collection',
            
            // Format 3: [Type] [Adjective] [Category]
            fn() => $this->faker->randomElement($collectionTypes) . ' ' . $this->faker->randomElement($collectionAdjectives) . ' ' . $this->faker->randomElement($productCategories),
            
            // Format 4: The [Adjective] [Category] Collection
            fn() => 'The ' . $this->faker->randomElement($collectionAdjectives) . ' ' . $this->faker->randomElement($productCategories) . ' Collection',
            
            // Format 5: [Year] [Type] [Category]
            fn() => $this->faker->year() . ' ' . $this->faker->randomElement($collectionTypes) . ' ' . $this->faker->randomElement($productCategories)
        ];

        return [
            'title' => $this->faker->randomElement($collectionTypes) . ' ' . $this->faker->randomElement($productCategories) . ' Collection',
            'url' => $this->faker->url,
        ];
    }
}
