<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert  ([
            'name' => 'user1',
            'email' => 'user1@example.com',
            'password' => bcrypt('user1'),
            'gender' => 'male',
            'dob' => '2003-04-01',
        ]);
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin'),
            'gender' => 'female',
            'dob' => '1999-09-12',
            'role' => 'admin',
        ]);
    }
}
