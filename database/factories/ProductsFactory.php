<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => rand(1,2),
            'category_id' => rand(2,3),
            'product_name' => fake()->name(),
            'product_price' => fake()->randomNumber(3),
            'product_image' => fake()->imageUrl($width=640, $height=480),
            'status' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
