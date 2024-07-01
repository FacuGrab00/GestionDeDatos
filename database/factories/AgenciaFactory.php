<?php

namespace Database\Factories;

use App\Models\Agencia;
use App\Models\AgenteComercial;
use App\Models\Ciudad;
use Illuminate\Database\Eloquent\Factories\Factory;

class AgenciaFactory extends Factory
{
    protected $model = Agencia::class;
    private static $codigoAgenciaPrefix = 'A';
    private static $currentCodigoAgenciaNumber = 0;

    public function definition()
    {
        $codigoAgencia = self::$codigoAgenciaPrefix . str_pad(self::$currentCodigoAgenciaNumber, 3, '0', STR_PAD_LEFT);
        self::$currentCodigoAgenciaNumber++;

        return [
            'codigo_de_agencia' => $codigoAgencia,
            'direccion' => $this->faker->address,
            'telefono' => $this->faker->phoneNumber,
            'id_ciudad' => Ciudad::inRandomOrder()->first()->id_ciudad,
        ];
    }
}
