<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Collection;
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
        

        // $brands = ['Nike', 'Adidas', 'Apple', 'Samsung', 'IKEA', 'H&M', 'Zara', 'Sony', 'LG', 'Amazon Basics'];
        // $productTypes = ['T-shirt', 'Jeans', 'Sneakers', 'Smartphone', 'Laptop', 'Sofa', 'Lamp', 'Watch', 'Headphones', 'Backpack'];

        // return [
        //     'title' => $this->faker->randomElement($brands) . ' ' . $this->faker->randomElement($productTypes),
        //     'url' => $this->faker->url,
        //     'brand' => $this->faker->randomElement($brands),
        //     'price' => $this->faker->randomFloat(2, 10, 1000),
        //     'image' => $this->faker->imageUrl(),
        // ];
        $brands = [
            'Nike', 'Adidas', 'Apple', 'Samsung', 'IKEA', 'H&M', 'Zara', 'Sony', 'LG', 'Amazon Basics',
            'Puma', 'Reebok', 'Under Armour', 'Levi\'s', 'Gap', 'Uniqlo', 'Microsoft', 'Dell', 'HP', 'Lenovo',
            'Asus', 'Acer', 'Bose', 'Panasonic', 'Canon', 'Nikon', 'GoPro', 'Fitbit', 'Garmin', 'Casio',
            'Timex', 'Fossil', 'Skechers', 'New Balance', 'Converse', 'Vans', 'The North Face', 'Columbia',
            'Patagonia', 'Ray-Ban', 'Oakley', 'Gucci', 'Prada', 'Philips', 'Braun', 'KitchenAid', 'Dyson'
        ];
    
        $productTypes = [
            'T-shirt', 'Jeans', 'Sneakers', 'Smartphone', 'Laptop', 'Sofa', 'Lamp', 'Watch', 'Headphones', 'Backpack',
            'Hoodie', 'Dress', 'Jacket', 'Skirt', 'Shorts', 'Sweater', 'Coat', 'Suit', 'Blazer', 'Pants',
            'Tablet', 'Desktop PC', 'Monitor', 'Keyboard', 'Mouse', 'Printer', 'Speaker', 'Smart TV', 'Gaming Console', 'Camera',
            'Refrigerator', 'Washing Machine', 'Microwave', 'Blender', 'Coffee Maker', 'Toaster', 'Vacuum Cleaner', 'Air Purifier',
            'Fitness Tracker', 'Yoga Mat', 'Dumbbell Set', 'Treadmill', 'Bicycle', 'Tent', 'Sleeping Bag', 'Hiking Boots',
            'Sunglasses', 'Wallet', 'Belt', 'Scarf', 'Gloves', 'Umbrella', 'Suitcase', 'Handbag', 'Perfume', 'Skincare Set'
        ];
    
        $brand = $this->faker->randomElement($brands);
        $productType = $this->faker->randomElement($productTypes);
    
        $titleFormats = [
            fn() => "$brand $productType",
            fn() => "$brand " . $this->faker->word . " $productType",
            fn() => "$brand $productType - " . $this->faker->word,
            fn() => $this->faker->word . " $brand $productType",
            fn() => "$brand " . $this->faker->word . " " . $this->faker->word . " $productType",
        ];
    
        return [
            'user_id' => User::factory(),  
            'collection_id' => Collection::factory(),  
            'title' => $this->faker->randomElement($titleFormats)(),
            'url' => $this->faker->url,
            'brand' => $brand,
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'image' => $this->faker->imageUrl(640, 480, "$brand $productType", true),
        ];
    }
}
