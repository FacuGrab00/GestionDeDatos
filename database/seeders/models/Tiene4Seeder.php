<?php

namespace Database\Seeders\models;

use App\Models\Agencia;
use App\Models\Cliente;
use App\Models\Preferencia;
use App\Models\Tiene;
use App\Models\Zona;
use Illuminate\Database\Seeder;

class Tiene4Seeder extends Seeder
{
    public function run()
    {
        $preferencias = Preferencia::all();

        foreach ($preferencias as $preferencia) {
            $cliente = Cliente::where('DNI', $preferencia->DNI)->where('codigo_cliente', $preferencia->codigo_cliente)->first();

            if ($cliente) {
                $agencia = Agencia::where('codigo_de_agencia', $cliente->codigo_cliente)->first();

                if ($agencia) {
                    $zonas = Zona::where('id_ciudad', $agencia->id_ciudad)->where('codigo_de_agencia', $agencia->codigo_de_agencia)->get();

                    if ($zonas->isNotEmpty()) {
                        $zonaAleatoria = $zonas->random();

                        if ($zonaAleatoria) {
                            Tiene::create([
                                'secuencia' => $preferencia->secuencia,
                                'nombre_zona' => $zonaAleatoria->nombre,
                                'id_ciudad' => $zonaAleatoria->id_ciudad,
                                'codigo_cliente' => $preferencia->codigo_cliente,
                                'DNI_cliente' => $preferencia->DNI,
                            ]);
                        }
                    }
                }
            }
        }
    }
}
