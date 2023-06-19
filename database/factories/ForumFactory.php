<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ForumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'userid' => $this->faker->numberBetween(1,2),
            'title' => $this->faker->sentence(2),
            'description' => $this->faker->paragraph(),
            'date' => $this->faker->date('Y-m-d H:i:s', 'now')
        ];
    }
}
