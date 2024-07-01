<?php

namespace Database\Seeders;

use Database\Seeders\models\AgenciaSeeder;
use Database\Seeders\models\AgenteComercialSeeder;
use Database\Seeders\models\CiudadSeeder;
use Database\Seeders\models\ClienteSeeder;
use Database\Seeders\models\CompranSeeder;
use Database\Seeders\models\Tiene4Seeder;
use Database\Seeders\models\VendenSeeder;
use Database\Seeders\models\VisitaSeeder;
use Database\Seeders\models\InmuebleSeeder;
use Database\Seeders\models\InmueblesTypeSeeder;
use Database\Seeders\models\PersonaSeeder;
use Database\Seeders\models\PreferenciasSeeder;
use Database\Seeders\models\RegistranSeeder;
use Database\Seeders\models\TelefonoSeeder;
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
        $this->call(PersonaSeeder::class);
        $this->call(TelefonoSeeder::class);
        $this->call(CiudadSeeder::class);
        $this->call(AgenteComercialSeeder::class);
        $this->call(ClienteSeeder::class);
        $this->call(AgenciaSeeder::class);
        $this->call(ZonaSeeder::class);
        $this->call(InmuebleSeeder::class);
        $this->call(InmueblesTypeSeeder::class);
        $this->call(PreferenciasSeeder::class);
        $this->call(TrabajanSeeder::class);
        $this->call(RegistranSeeder::class);
        $this->call(VisitaSeeder::class);
        $this->call(Tiene4Seeder::class);
        $this->call(CompranSeeder::class);
        $this->call(VendenSeeder::class);
    }
}
