<?php

namespace Database\Seeders\models;

use App\Models\Inmueble;
use App\Models\Registran;
use App\Models\Trabajan;
use App\Models\Venden;
use Illuminate\Database\Seeder;

class VendenSeeder extends Seeder
{
    public function run()
    {
        $inmuebles = Inmueble::whereNotNull('propietario')->inRandomOrder()->limit(10)->get();

        foreach ($inmuebles as $inmueble) {
            $agencia = $inmueble->agencia;

            $trabajan = Trabajan::where('codigo_de_agencia', $agencia->codigo_de_agencia)->inRandomOrder()->first();

            if ($trabajan) {
                $registran = Registran::where('codigo_de_agencia', $agencia->codigo_de_agencia)->inRandomOrder()->first();

                if ($registran) {
                    $cliente = $registran->cliente;
                    $agente = $trabajan->agenteComercial;

                    if ($cliente && $agente) {
                        Venden::create([
                            'DNI_cliente' => $cliente->DNI,
                            'codigo_cliente' => $cliente->codigo_cliente,
                            'DNI_agente' => $agente->DNI,
                            'codigo_inmueble' => $inmueble->codigo_inmueble,
                            'fecha_venta' => null,
                        ]);
                    }
                }
            }
        }
    }
}
