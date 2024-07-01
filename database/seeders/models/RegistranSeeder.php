<?php

namespace Database\Seeders\models;

use App\Models\Agencia;
use App\Models\Cliente;
use App\Models\Registran;
use App\Models\Trabajan;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RegistranSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $clientes = Cliente::all();
        $agencias = Agencia::all();

        foreach ($clientes as $cliente) {
            $agentes = [];
            while (!(count($agentes) > 0)) {
                $agencia = $faker->randomElement($agencias);
                $agentes = Trabajan::where('codigo_de_agencia', $agencia->codigo_de_agencia)->pluck('DNI')->toArray();
            }

            if (count($agentes) > 0) {
                $agente = $faker->randomElement($agentes);

                Registran::create([
                    'DNI_cliente' => $cliente->DNI,
                    'codigo_cliente' => $cliente->codigo_cliente,
                    'codigo_de_agencia' => $agencia->codigo_de_agencia,
                    'DNI_agente' => $agente,
                    'fecha_registro' => $faker->date(),
                ]);
            }
        }
    }
}
