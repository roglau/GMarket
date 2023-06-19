<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
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
            'forumid' => $this->faker->numberBetween(1,5),
            'date' => $this->faker->date('Y-m-d H:i:s', 'now'),
            'comment' => $this->faker->paragraph(),
        ];
    }
}
