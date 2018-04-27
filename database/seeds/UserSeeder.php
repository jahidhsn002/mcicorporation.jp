<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Clear previous data
        User::truncate();

        User::create([
            'name' => 'Jahid Hasan',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('64526452')
        ]);
    }
}
