<?php

namespace Database\Factories;

use App\Models\AgenteComercial;
use App\Models\Persona;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class AgenteComercialFactory extends Factory
{
    protected $model = AgenteComercial::class;

    public function definition()
    {
        $dniList = Persona::pluck('DNI')->toArray();
        $fechaContratacion = $this->faker->dateTimeBetween('-30 years', 'now');
        $antiguedad = abs(Carbon::now()->diffInYears($fechaContratacion));

        return [
            'DNI' => $this->faker->unique()->randomElement($dniList),
            'fecha_contratacion' => $fechaContratacion->format('Y-m-d'),
            'antiguedad' => intval($antiguedad),
            'cantidad_anual_facturada' => $this->faker->numberBetween(10, 1000) * 1000,
        ];
    }
}
