<?php

namespace Database\Seeders\models;

use Illuminate\Database\Seeder;
use App\Models\Persona;
use App\Models\Telefono;
use Faker\Factory as Faker;

class TelefonoSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $personas = Persona::all();

        foreach ($personas as $persona) {
            Telefono::create([
                'num_tel' => $faker->phoneNumber,
                'DNI' => $persona->DNI,
                'cod_area' => 054,
            ]);
        }
    }
}
