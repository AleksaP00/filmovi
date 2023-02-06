<?php

namespace Database\Seeders;

use App\Models\Projekcija;
use Illuminate\Database\Seeder;

class ProjekcijaS extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 20; $i++) {

            Projekcija::create([
                'filmID' => $faker->numberBetween(1, 10),
                'datum' => $faker->dateTimeBetween('-6 months', '2 years')->format('d-m-Y'),
                'sala' => $faker->numberBetween(1,6)
            ]);
        }
    }
}
