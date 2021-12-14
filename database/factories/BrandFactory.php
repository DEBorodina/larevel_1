<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'creation_year' => $this->faker->year(2021),
            'status'=>$this->faker->boolean(),
            'description' => $this->faker->realTextBetween(100,200),
            'logo' => $this->faker->imageUrl(600,600),
        ];
    }
}
