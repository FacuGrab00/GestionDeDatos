<?php

namespace Database\Factories;

use App\Models\AgenteComercial;
use App\Models\Cliente;
use App\Models\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    protected $model = Cliente::class;

    public function definition()
    {
        $dniList = Persona::whereNotIn('DNI', AgenteComercial::pluck('DNI')->toArray())->pluck('DNI')->toArray();

        return [
            'DNI' => $this->faker->unique()->randomElement($dniList),
            'fecha_registro' => $this->faker->date(),
            'codigo_cliente' => $this->faker->unique()->numberBetween(1000, 9999),
        ];
    }
}
