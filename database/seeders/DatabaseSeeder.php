<?php

namespace Database\Seeders;

use App\Models\AgenteComercial;
use Database\Seeders\models\AgenciaSeeder;
use Database\Seeders\models\CiudadSeeder;
use Database\Seeders\models\ClienteSeeder;
use Database\Seeders\models\InmuebleSeeder;
use Database\Seeders\models\PersonaSeeder;
use Database\Seeders\models\ZonaSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(PersonaSeeder::class);
        $this->call(CiudadSeeder::class);
        $this->call(AgenteComercial::class);
        $this->call(ClienteSeeder::class);
        $this->call(AgenciaSeeder::class);
        $this->call(ZonaSeeder::class);
        $this->call(InmuebleSeeder::class);
    }
}
