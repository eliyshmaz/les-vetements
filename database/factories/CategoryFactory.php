<?php

namespace Database\Factories;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $category_name = $this->faker->unique()->words($nb=2,$asText = true);
        $slug = str::slug($category_name);
        return [
            'name' =>str::title($category_name),
            'slug' =>$slug,
            'image' => $this->faker->numberBetween(1,6).'.jpg'
        ];
    }
}
