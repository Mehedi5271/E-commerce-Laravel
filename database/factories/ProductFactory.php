<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
  
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
        $categories =[1, 2, 3];
        $title = fake()->unique()->realText(100);

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => fake()->paragraph(100),
            'price' => rand(100,1000),
            'is_active' => true,
            'category_id' => $categories[array_rand($categories, 1)]
        ];
    }
}
