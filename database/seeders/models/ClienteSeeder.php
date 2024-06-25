<?php

namespace Database\Seeders\models;

use App\Models\AgenteComercial;
use App\Models\Cliente;
use App\Models\Persona;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    public function run(): void
    {
        $personas = Persona::whereNotIn('DNI', AgenteComercial::pluck('DNI'))->inRandomOrder()->limit(10000)->get();

        foreach ($personas as $persona) {
            Cliente::factory()->create([
                'DNI' => $persona->DNI,
            ]);
        }
    }
}
