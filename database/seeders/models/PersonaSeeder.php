<?php

namespace Database\Seeders\models;

use App\Models\Persona;
use Illuminate\Database\Seeder;

class PersonaSeeder extends Seeder
{
    public function run(): void
    {
        Persona::factory()->count(100000)->create();
    }
}
