<?php

namespace Database\Seeders\models;

use App\Models\Agencia;
use App\Models\Inmueble;
use App\Models\Zona;
use Illuminate\Database\Seeder;

class InmuebleSeeder extends Seeder
{
    public function run()
    {
        $agencias = Agencia::all();

        foreach ($agencias as $agencia) {
            $zonas = Zona::where('codigo_de_agencia', $agencia->codigo_de_agencia)->get();

            for ($i = 0; $i < 30; $i++) {
                if ($zonas->isEmpty()) {
                    continue;
                }

                $zona = $zonas->random();

                Inmueble::create([
                    'direccion' => fake()->address,
                    'estado' => fake()->randomElement(['Disponible', 'Vendido', 'Reservado']),
                    'precio_venta' => fake()->randomFloat(2, 100000, 1000000),
                    'codigo_de_agencia' => $agencia->codigo_de_agencia,
                    'nombre_zona' => $zona->nombre,
                    'id_ciudad' => $zona->id_ciudad,
                ]);
            }
        }
    }
}
