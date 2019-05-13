<?php

use Illuminate\Database\Seeder;
use App\Assets;

class AssetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $faker = \Faker\Factory::create();

        Assets::create([
            'name' => 'mazarratti',
            'description' => 'super car',
            'model' => 'gx11',
            'amount' => 2000000,
            'company_id' => 3,

        ]);

        $value = 1;
        $filePath = public_path('storage/assets');

        // And now let's generate a few dozen users for our app:
        for ($i = 0; $i < 25; $i++) {
            Assets::create([
                'name' => $faker->name,
                'description' => $faker->text($maxNbChars = 20),
                'model' => $faker->randomDigit,
                'amount' => $faker->numberBetween(1, 10000),
                'status' => $value,
                'company_id' => $faker->unique(true)->numberBetween(1, 25),
            ]);
        }
    }
}

