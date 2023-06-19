<?php

namespace Database\Seeders;

use App\Models\Games;
use Illuminate\Database\Seeder;

class GamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Games::factory(25)->create();
    }
}
