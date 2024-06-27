<?php

namespace Database\Seeders\models;

use App\Models\Campo;
use App\Models\Inmueble;
use App\Models\LocalComercial;
use App\Models\Vivienda;
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
        switch ($type) {
            case Campo::class:
                return [
                    'codigo_inmueble' => $codigo_inmueble,
                    'superficie' => fake()->numberBetween(100, 10000),
                    'urbanizacion' => fake()->boolean(),
                ];
            case LocalComercial::class:
                return [
                    'codigo_inmueble' => $codigo_inmueble,
                    'area' => fake()->numberBetween(50, 500),
                    'uso' => fake()->word(),
                ];
            case Vivienda::class:
                return [
                    'codigo_inmueble' => $codigo_inmueble,
                    'banios' => fake()->numberBetween(1, 3),
                    'numero_habitaciones' => fake()->numberBetween(1, 5),
                    'descripcion' => fake()->text(200),
                    'superficie' => fake()->numberBetween(50, 300),
                    'plaza_garaje' => fake()->boolean(),
                ];
        }
    }
}
