<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
            'genrename' => 'Action'
        ]);

        DB::table('genres')->insert([
            'genrename' => 'FPS'
        ]);

        DB::table('genres')->insert([
            'genrename' => 'RPG'
        ]);

        DB::table('genres')->insert([
            'genrename' => 'Adventure'
        ]);

        DB::table('genres')->insert([
            'genrename' => 'Sport'
        ]);
    }
}
