<?php

namespace Database\Seeders\models;

use Illuminate\Database\Seeder;
use App\Models\HistorialVisitas;
use App\Models\Inmueble;
use App\Models\Registran;
use App\Models\Trabajan;
use Faker\Factory as Faker;

class HistorialVisitaSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $inmuebles = Inmueble::all();
        $visitasCreadas = 0;

        while ($visitasCreadas < 10000) {
            $inmueble = $inmuebles->random();
            $agencia = $inmueble->agencia;

            if ($agencia) {
                $agente = Trabajan::where('codigo_de_agencia', $agencia->codigo_de_agencia)->inRandomOrder()->first();

                if ($agente) {
                    $cliente = Registran::where('codigo_de_agencia', $agencia->codigo_de_agencia)->inRandomOrder()->first();

                    $senal = null;

                    $senal = $faker->boolean(50) ? $faker->randomFloat(2, 100, 1000) : null;

                    if ($cliente) {
                        HistorialVisitas::create([
                            'senal' => $senal,
                            'fecha' => $faker->date(),
                            'duracion' => $faker->time(),
                            'DNI_cliente' => $cliente->cliente->DNI,
                            'codigo_cliente' => $cliente->cliente->codigo_cliente,
                            'DNI_agente' => $agente->DNI,
                            'codigo_inmueble' => $inmueble->codigo_inmueble,
                        ]);

                        $visitasCreadas++;
                    }
                }
            }
        }
    }

}
