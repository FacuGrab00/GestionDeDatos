<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inmueble extends Model
{
    use HasFactory;

    protected $table = 'inmuebles';

    protected $primaryKey = 'codigo_inmueble';

    public $incrementing = false;

    protected $fillable = [
        'codigo_inmueble',
        'propietario',
        'direccion',
        'estado',
        'precio_venta',
        'codigo_de_agencia',
        'nombre_zona',
        'id_ciudad',
        'fecha_disponible',
    ];

    protected $dates = [
        'fecha_disponible',
    ];

    public $timestamps = false;

    public function propietario(): BelongsTo
    {
        return $this->belongsTo(Cliente::class, 'propietario', 'DNI');
    }

    public function agencia(): BelongsTo
    {
        return $this->belongsTo(Agencia::class, 'codigo_de_agencia', 'codigo_de_agencia');
    }

    public function zona(): BelongsTo
    {
        return $this->belongsTo(Zona::class, ['id_ciudad', 'nombre_zona'], ['id_ciudad', 'nombre']);
    }
}
