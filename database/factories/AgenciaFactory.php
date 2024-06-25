<?php

namespace Database\Factories;

use App\Models\Agencia;
use App\Models\AgenteComercial;
use App\Models\Ciudad;
use Illuminate\Database\Eloquent\Factories\Factory;

class AgenciaFactory extends Factory
{
    protected $model = Agencia::class;

    public function definition()
    {
        $ciudadId = Ciudad::inRandomOrder()->first()->id_ciudad;
        return [
            'codigo_de_agencia' => $this->faker->unique()->regexify('[A-Z0-9]{10}'),
            'direccion' => $this->faker->address,
            'telefono' => $this->faker->phoneNumber,
            'id_ciudad' => $ciudadId,
        ];
    }
}
