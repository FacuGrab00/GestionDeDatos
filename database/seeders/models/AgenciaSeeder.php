<?php

namespace Database\Seeders\models;

use App\Models\Agencia;
use App\Models\Ciudad;
use Illuminate\Database\Seeder;

class AgenciaSeeder extends Seeder
{
    public function run()
    {
        $ciudades = Ciudad::all();

        foreach ($ciudades as $ciudad) {
            Agencia::factory()->count(2)->create([
                'id_ciudad' => $ciudad->id_ciudad,
            ]);
        }
    }
}
