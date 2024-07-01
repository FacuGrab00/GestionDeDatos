<?php

namespace Database\Factories;

use App\Models\AgenteComercial;
use App\Models\Cliente;
use App\Models\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    protected $model = Cliente::class;

    private static $codigoClientePrefix = 'A';
    private static $currentCodigoClienteNumber = 0;

    public function definition()
    {
        $codigoCliente = self::$codigoClientePrefix . str_pad(self::$currentCodigoClienteNumber, 3, '0', STR_PAD_LEFT);
        self::$currentCodigoClienteNumber++;

        return [
            'DNI' => Persona::whereNotIn('DNI', AgenteComercial::pluck('DNI')->toArray())->pluck('DNI')->random(),
            'codigo_cliente' => $codigoCliente,
        ];
    }
}
