<?php

namespace Database\Seeders\models;

use App\Models\AgenteComercial;
use Illuminate\Database\Seeder;

class AgenteComercialSeeder extends Seeder
{
    public function run(): void
    {
        AgenteComercial::factory()->count(1000)->create();
    }
}
