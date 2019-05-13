<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's clear the users table first
        User::truncate();

        $faker = \Faker\Factory::create();

        // Let's make sure everyone has the same password and
        // let's hash it before the loop, or else our seeder
        // will be too slow.
        $password = Hash::make('toptal');

        $value = 1;

        User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'type' => 1,
            'status' => 1 ,
        ]);

        User::create([
            'name' => 'Optimus Prime',
            'email' => 'Prime@gmail.com',
            'password' =>Hash::make('transform'),
            'type' => 1,
            'status' => 1 ,
        ]);

        // And now let's generate a few dozen users for our app:
        for ($i = 0; $i < 12; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $password,
                'type' => $value,
                'status' => $value,
            ]);
        }
    }
}
