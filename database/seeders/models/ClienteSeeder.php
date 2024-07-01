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
        Cliente::factory()->count(9000)->create();
    }
}
