<?php

namespace Database\Factories;

use App\Models\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonaFactory extends Factory
{
    protected $model = Persona::class;

    public function definition()
    {
        return [
            'direccion' => $this->faker->address,
            'nombre' => $this->faker->name,
            'DNI' => $this->faker->unique()->regexify('[0-9]{8}'),
        ];
    }
}
