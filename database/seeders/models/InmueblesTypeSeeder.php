<?php

namespace Database\Seeders\models;

use App\Models\Campo;
use App\Models\Inmueble;
use App\Models\LocalComercial;
use App\Models\Vivienda;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class InmueblesTypeSeeder extends Seeder
{
    public function run()
    {
        $inmuebles = Inmueble::all();
        $totalInmuebles = $inmuebles->count();

        $shuffledInmuebles = $inmuebles->shuffle();

        $chunks = $shuffledInmuebles->chunk(ceil($totalInmuebles / 3));

        $this->createInmuebles(Campo::class, $chunks->get(0));
        $this->createInmuebles(LocalComercial::class, $chunks->get(1));
        $this->createInmuebles(Vivienda::class, $chunks->get(2));
    }

    private function createInmuebles($type, $inmuebles)
    {
        foreach ($inmuebles as $inmueble) {
            $attributes = $this->generateAttributes($type, $inmueble->codigo_inmueble);
            $type::create($attributes);
        }
    }

    private function generateAttributes($type, $codigo_inmueble)
    {
        $faker = Faker::create();
        switch ($type) {
            case Campo::class:
                $superficie = $faker->numberBetween(1, 100) * 100;

                return [
                    'codigo_inmueble' => $codigo_inmueble,
                    'superficie' => $superficie,
                    'urbanizacion' => fake()->boolean(),
                ];
            case LocalComercial::class:
                $area = $faker->numberBetween(5, 50) * 10;

                return [
                    'codigo_inmueble' => $codigo_inmueble,
                    'area' => $area,
                    'uso' => fake()->randomElement(['Supermercado', 'Kiosco', 'Indumentaria', 'Bazar', 'Peluqueria', 'Shopping']),
                ];
            case Vivienda::class:
                $superficie = $faker->numberBetween(5, 30) * 10;

                return [
                    'codigo_inmueble' => $codigo_inmueble,
                    'banios' => fake()->numberBetween(1, 3),
                    'numero_habitaciones' => fake()->numberBetween(1, 5),
                    'descripcion' => fake()->text(200),
                    'superficie' => $superficie,
                    'plaza_garaje' => fake()->boolean(),
                ];
        }
    }
}
