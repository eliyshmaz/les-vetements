<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $brand_name = $this->faker->unique()->words($nb=2,$asText = true);
        $slug = str::slug($brand_name);
        return [
            'name' =>str::title($brand_name),
            'slug' =>$slug,
            'image' => $this->faker->numberBetween(1,6).'.jpg'
        ];
    }
}
