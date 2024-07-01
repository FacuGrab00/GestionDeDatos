<?php

namespace Database\Seeders\models;

use App\Models\Cliente;
use Illuminate\Database\Seeder;
use App\Models\Visita;
use App\Models\Inmueble;
use App\Models\Registran;
use App\Models\Trabajan;
use Faker\Factory as Faker;

class VisitaSeeder extends Seeder
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
                    $clienteRegistro = Registran::where('codigo_de_agencia', $agencia->codigo_de_agencia)
                        ->inRandomOrder()
                        ->first();

                    if ($clienteRegistro) {
                        $cliente = Cliente::where('DNI', $clienteRegistro->DNI_cliente)
                            ->where('codigo_cliente', $clienteRegistro->codigo_cliente)
                            ->first();

                        $sena = $faker->boolean(50) ? $faker->numberBetween(1, 100) * 100 : null;
                        $fechaProgramada = $faker->dateTimeBetween('-5 years', '+1 month')->format('Y-m-d');
                        $estado = $fechaProgramada < now()->format('Y-m-d') ? $faker->randomElement(['REALIZADA', 'SUSPENDIDA']) : 'PENDIENTE';

                        $duracion = sprintf('%02d:%02d:00', $faker->numberBetween(0, 3), $faker->numberBetween(0, 59));

                        Visita::create([
                            'senal' => $sena,
                            'fecha' => $fechaProgramada,
                            'duracion' => $duracion,
                            'DNI_cliente' => $cliente->DNI,
                            'codigo_cliente' => $cliente->codigo_cliente,
                            'DNI_agente' => $agente->DNI,
                            'codigo_inmueble' => $inmueble->codigo_inmueble,
                            'estado' => $estado
                        ]);

                        $visitasCreadas++;
                    }
                }
            }
        }
    }
}
