<?php

namespace Database\Seeders\models;

use App\Models\Agencia;
use App\Models\Inmueble;
use App\Models\Zona;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class InmuebleSeeder extends Seeder
{
    private static $codigoInmueblePrefix = 'A';
    private static $currentCodigoInmuebleNumber = 0;

    public function run()
    {
        $agencias = Agencia::all();
        $faker = Faker::create();

        foreach ($agencias as $agencia) {
            $zonas = Zona::where('codigo_de_agencia', $agencia->codigo_de_agencia)->get();

            for ($i = 0; $i < 30; $i++) {
                if ($zonas->isEmpty()) {
                    continue;
                }

                $zona = $zonas->random();

                $codigoInmueble = self::$codigoInmueblePrefix . str_pad(self::$currentCodigoInmuebleNumber, 3, '0', STR_PAD_LEFT);
                self::$currentCodigoInmuebleNumber++;
                if (self::$currentCodigoInmuebleNumber > 999) {
                    self::$currentCodigoInmuebleNumber = 0;
                    self::$codigoInmueblePrefix++;
                }

                $fechaDisponible = $faker->optional(0.7)->dateTimeBetween('-1 month', '+6 months');
                $fechaDisponibleFormatted = $fechaDisponible ? $fechaDisponible->format('Y-m-d') : null;
                $precioVenta = $faker->numberBetween(100, 1000) * 1000;

                Inmueble::create([
                    'codigo_inmueble' => $codigoInmueble,
                    'direccion' => fake()->address,
                    'estado' => fake()->randomElement(['Disponible', 'Vendido', 'Reservado']),
                    'precio_venta' => $precioVenta,
                    'codigo_de_agencia' => $agencia->codigo_de_agencia,
                    'nombre_zona' => $zona->nombre,
                    'id_ciudad' => $zona->id_ciudad,
                    'fecha_disponible' => $fechaDisponibleFormatted,
                ]);
            }
        }
    }
}
