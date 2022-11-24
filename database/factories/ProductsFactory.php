<?php

namespace Database\Factories;

use Illuminate\Support\Str;
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
            'name' => fake()->sentence($nbWords = 4, $variableNbWords = true),
            'category_id' => fake()->randomElement($array = array(5, 6, 7, 8)),
            'color_id' => fake()->randomElement($array = array(3, 4, 5, 6, 7)),
            'size_id' => fake()->randomElement($array = array(8, 9, 10, 11)),
            'short_description' => fake()->sentence($nbWords = 8, $variableNbWords = true),
            'description' => fake()->sentence($nbWords = 18, $variableNbWords = true),
            'regular_price' => fake()->numberBetween($min = 1000, $max = 9000),
            'selling_price' => fake()->numberBetween($min = 1000, $max = 9000),
            'stock_quantity' => fake()->numberBetween($min = 10, $max = 20),
        ];
    }
}
