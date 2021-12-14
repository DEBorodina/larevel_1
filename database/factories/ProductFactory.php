<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'name' => $this->faker->sentence(2),
            'price' => $this->faker->randomNumber(),
            'status'=>$this->faker->boolean(),
            'content' => $this->faker->realTextBetween(100,200),
            'img' => $this->faker->imageUrl(600,600),
        ];
    }
}
