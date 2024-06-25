<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgenteComercial extends Model
{
    use HasFactory;

    protected $table = 'agentes_comerciales';

    protected $primaryKey = 'DNI';

    public $incrementing = false;

    protected $fillable = [
        'DNI',
        'fecha_contratacion',
        'antiguedad',
        'cantidad_anual_facturada',
    ];

    protected $dates = [
        'fecha_contratacion',
    ];

    public $timestamps = false;

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'DNI', 'DNI');
    }
}
