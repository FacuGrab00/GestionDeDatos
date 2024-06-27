<?php

namespace Database\Seeders;

use App\Models\AgenteComercial;
use Database\Seeders\models\AgenciaSeeder;
use Database\Seeders\models\CiudadSeeder;
use Database\Seeders\models\ClienteSeeder;
use Database\Seeders\models\HistorialVisitaSeeder;
use Database\Seeders\models\InmuebleSeeder;
use Database\Seeders\models\InmueblesTypeSeeder;
use Database\Seeders\models\PersonaSeeder;
use Database\Seeders\models\PreferenciasSeeder;
use Database\Seeders\models\RegistranSeeder;
use Database\Seeders\models\TrabajanSeeder;
use Database\Seeders\models\ZonaSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PersonaSeeder::class,
            CiudadSeeder::class,
            AgenteComercial::class,
            ClienteSeeder::class,
            AgenciaSeeder::class,
            ZonaSeeder::class,
            InmuebleSeeder::class,
            InmueblesTypeSeeder::class,
            PreferenciasSeeder::class,
            TrabajanSeeder::class,
            RegistranSeeder::class,
            HistorialVisitaSeeder::class
        ]);
    }
}
