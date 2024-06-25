<?php

namespace Database\Seeders\models;

use App\Models\Ciudad;
use Illuminate\Database\Seeder;

class CiudadSeeder extends Seeder
{
    public function run()
    {
        $ciudades = [
            'Resistencia',
            'Barranqueras',
            'Fontana',
            'Puerto Vilelas',
            'General José de San Martín',
            'La Eduvigis',
            'La Leonesa',
            'Las Palmas',
            'Pampa Almirón',
            'Puerto Bermejo',
            'General Vedia',
            'Isla del Cerrito',
            'Colonia Benítez',
            'Colonia Popular',
            'Margarita Belén',
            'Basail',
            'Cote Lai',
            'Charadai',
            'Machagai',
            'Quitilipi',
            'Presidencia Roque Sáenz Peña',
            'Avia Terai',
            'Campo Largo',
            'Concepción del Bermejo',
            'Napalpí',
            'Tres Isletas',
            'Taco Pozo',
            'Villa Ángela',
            'Corzuela',
            'Las Breñas',
            'Santa Sylvina',
            'San Bernardo',
            'La Clotilde',
            'La Tigra',
            'Samuhú',
            'General Pinedo',
            'General Capdevila',
            'Gancedo',
            'Los Frentones',
            'Pampa del Infierno',
            'Río Muerto',
            'Presidencia de la Plaza',
            'Colonia Elisa',
            'Colonia Baranda',
            'Laguna Blanca',
            'Laguna Limpia',
            'Las Garcitas',
            'Selvas del Río de Oro',
            'Villa Berthet',
            'Miraflores',
            'Juan José Castelli',
            'Tres Pozos',
            'Fortín Lavalle',
            'Misión Nueva Pompeya',
            'Fuerte Esperanza',
            'El Sauzalito',
            'Nueva Población',
            'Wichí',
            'El Pintado',
            'El Espinillo',
            'Villa Río Bermejito',
            'Puerto Eva Perón',
            'Campo Largo',
            'Los Frentones',
            'Napén',
            'Pampa del Indio',
            'Presidencia Roca',
            'Taco Pozo',
            'Villa Ángela',
            'Zuberbühler',
            'La Escondida',
            'La Verde',
            'Lapachito',
            'Makallé',
            'Puerto Tirol',
            'Ciervo Petiso',
            'Colonias Unidas',
            'Las Garzas',
            'Capitán Solari',
            'Villa El Palmar'
        ];

        foreach ($ciudades as $ciudad) {
            Ciudad::create(['nombre' => $ciudad]);
        }
    }
}
