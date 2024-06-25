<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vivienda extends Model
{
    use HasFactory;

    protected $table = 'viviendas';

    protected $primaryKey = 'codigo_inmueble';

    public $incrementing = true;

    protected $fillable = [
        'banios',
        'numero_habitaciones',
        'descripcion',
        'superficie',
        'plaza_garaje',
        'codigo_inmueble',
    ];

    public $timestamps = false;

    public function inmueble()
    {
        return $this->belongsTo(Inmueble::class, 'codigo_inmueble', 'codigo_inmueble');
    }
}
