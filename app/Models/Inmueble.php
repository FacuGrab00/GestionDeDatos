<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inmueble extends Model
{
    use HasFactory;

    protected $table = 'inmuebles';

    protected $primaryKey = 'codigo_inmueble';

    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'propietario',
        'codigo_inmueble',
        'direccion',
        'estado',
        'precio_venta',
        'codigo_de_agencia',
        'nombre_zona',
        'id_ciudad',
    ];

    public $timestamps = false;

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'propietario', 'DNI');
    }

    public function agencia()
    {
        return $this->belongsTo(Agencia::class, 'codigo_de_agencia', 'codigo_de_agencia');
    }

    public function zona()
    {
        return $this->belongsTo(Zona::class, ['id_ciudad', 'nombre_zona'], ['id_ciudad', 'nombre']);
    }
}
