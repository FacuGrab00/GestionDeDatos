<?php

namespace Database\Seeders\models;

use Illuminate\Database\Seeder;
use App\Models\AgenteComercial;
use App\Models\Agencia;
use App\Models\Trabajan;
use Faker\Factory as Faker;

class TrabajanSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $agentesComerciales = AgenteComercial::all();
        $agencias = Agencia::all();

        foreach ($agentesComerciales as $agente) {
            Trabajan::create([
                'DNI' => $agente->DNI,
                'codigo_de_agencia' => $faker->randomElement($agencias->pluck('codigo_de_agencia')->toArray()),
            ]);
        }
    }
}
