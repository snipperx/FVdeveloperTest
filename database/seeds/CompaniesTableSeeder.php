<?php

use Illuminate\Database\Seeder;
use App\Companies;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $random = str_random(10);

        $value = 1;

        for ($i = 0; $i < 25; $i++) {
            Companies::create([
                'name' => $faker->company,
                'email' => $faker->email,
                'description' => $faker->text($maxNbChars = 30),
                'website_url' => $faker->url,
                'status' => $value,
            ]);
        }
    }
}