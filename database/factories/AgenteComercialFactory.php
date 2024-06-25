<?php

namespace Database\Factories;

use App\Models\AgenteComercial;
use App\Models\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class AgenteComercialFactory extends Factory
{
    protected $model = AgenteComercial::class;

    public function definition()
    {
        $dniList = Persona::pluck('DNI')->toArray();

        return [
            'DNI' => $this->faker->unique()->randomElement($dniList),
            'fecha_contratacion' => $this->faker->date(),
            'antiguedad' => $this->faker->numberBetween(1, 30),
            'cantidad_anual_facturada' => $this->faker->numberBetween(10000, 1000000),
        ];
    }
}
