<?php

namespace Database\Seeders\models;

use App\Models\Cliente;
use App\Models\Preferencia;
use App\Models\Registran;
use App\Models\Tiene;
use App\Models\Zona;
use Illuminate\Database\Seeder;

class Tiene4Seeder extends Seeder
{
    public function run()
    {
        $preferencias = Preferencia::all();

        foreach ($preferencias as $preferencia) {
            $cliente = null;
            while (!$cliente) {
                $cliente = Cliente::where('DNI', $preferencia->DNI)->where('codigo_cliente', $preferencia->codigo_cliente)->first();
            }

            dump($cliente->toArray());

            $registran = null;
            while (!$registran) {
                $registran = Registran::where('codigo_cliente', $cliente->codigo_cliente)->first();
            }

            dump($registran->toArray());

            $agencia = $registran->agencia;

            dump($agencia->toArray());

            $zona = null;
            while (!$zona) {
                $zona = Zona::where('codigo_de_agencia', $agencia->codigo_de_agencia)->first();
            }

            Tiene::create([
                'secuencia' => $preferencia->secuencia,
                'nombre_zona' => $zona->nombre,
                'id_ciudad' => $zona->id_ciudad,
                'codigo_cliente' => $preferencia->codigo_cliente,
                'DNI_cliente' => $preferencia->DNI,
            ]);
        }
    }
}
