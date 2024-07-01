<?php

namespace Database\Seeders\models;

use App\Models\Cliente;
use App\Models\Preferencia;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class PreferenciasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $clientes = Cliente::all();

        foreach ($clientes as $cliente) {
            $precioMaximo = $faker->numberBetween(50, 500) * 1000;
            $precioMinimo = $faker->numberBetween(10, 49) * 1000;

            Preferencia::create([
                'secuencia' => $faker->unique()->numberBetween(100000, 999999),
                'DNI' => $cliente->DNI,
                'codigo_cliente' => $cliente->codigo_cliente,
                'fecha' => $faker->date(),
                'numero_de_habitaciones' => $faker->numberBetween(1, 5),
                'precio_maximo' => $precioMaximo,
                'precio_minimo' => $precioMinimo,
                'tipo' => $faker->randomElement(['Vivienda', 'Campo', 'Local comercial']),
            ]);
        }
    }
}
