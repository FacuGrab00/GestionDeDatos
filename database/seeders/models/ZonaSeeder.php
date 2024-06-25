<?php

namespace Database\Seeders\models;

use App\Models\Agencia;
use App\Models\Ciudad;
use App\Models\Zona;
use Illuminate\Database\Seeder;

class ZonaSeeder extends Seeder
{
    public function run()
    {
        $ciudades = Ciudad::all();
        $nombresZonas = ['Centro', 'Norte', 'Sur'];

        foreach ($ciudades as $ciudad) {
            $agencias = Agencia::where('id_ciudad', $ciudad->id_ciudad)->get();

            foreach ($nombresZonas as $nombre) {
                if ($agencias->isEmpty()) {
                    continue;
                }

                $agencia = $agencias->random();

                Zona::create([
                    'id_ciudad' => $ciudad->id_ciudad,
                    'nombre' => $nombre,
                    'codigo_de_agencia' => $agencia->codigo_de_agencia,
                ]);
            }
        }
    }
}
