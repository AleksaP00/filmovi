<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $this->call(UserS::class);
       $this->call(ZanrS::class);
       $this->call(FilmS::class);
       $this->call(ProjekcijaS::class);
    } 
}
