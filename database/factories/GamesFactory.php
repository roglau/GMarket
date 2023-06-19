<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GamesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $s = 'images/';
        return [
            'genreid' => $this->faker->numberBetween(1,5),
            'title' => $this->faker->sentence(2),
            'image' => $s . $this->faker->numberBetween(1,5) . '.png',
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->numberBetween(0,500),
            'rating' => $this->faker->numberBetween(0,18),
        ];
    }
}
