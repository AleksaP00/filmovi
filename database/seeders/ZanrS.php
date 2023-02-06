<?php

namespace Database\Seeders;

use App\Models\Zanr;
use Illuminate\Database\Seeder;

class ZanrS extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Zanr::create([
            'zanr' => 'Animacija'
        ]);

        Zanr::create([
            'zanr' => 'Avantura'
        ]);

        Zanr::create([
            'zanr' => 'Akcija'
        ]);

        Zanr::create([
            'zanr' => 'Drama'
        ]);

        Zanr::create([
            'zanr' => 'Krimi'
        ]);

        Zanr::create([
            'zanr' => 'Misterija'
        ]);

        Zanr::create([
            'zanr' => 'Horor'
        ]);

        Zanr::create([
            'zanr' => 'Sci-Fi'
        ]);
    
    }
}
