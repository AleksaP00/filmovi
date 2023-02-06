<?php

namespace Database\Seeders;

use App\Models\Film;
use Illuminate\Database\Seeder;

class FilmS extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {

            Film::create([
                'naziv' => ucfirst($faker->unique()->word),
                'zanrID' => $faker->numberBetween(1, 8),
                'reditelj' => $faker->name()
            ]);
        }


    }
}
