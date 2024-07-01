<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compran extends Model
{
    use HasFactory;

    protected $table = 'compran';

    protected $primaryKey = ['DNI_cliente', 'codigo_cliente', 'DNI_agente', 'codigo_inmueble'];

    public $incrementing = false;

    protected $fillable = [
        'DNI_cliente',
        'codigo_cliente',
        'DNI_agente',
        'codigo_inmueble',
        'fecha_compra',
    ];

    protected $dates = [
        'fecha_compra',
    ];

    public $timestamps = false;

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, ['DNI_cliente', 'codigo_cliente'], ['DNI', 'codigo_cliente']);
    }

    public function agenteComercial()
    {
        return $this->belongsTo(AgenteComercial::class, 'DNI_agente', 'DNI');
    }

    public function inmueble()
    {
        return $this->belongsTo(Inmueble::class, 'codigo_inmueble', 'codigo_inmueble');
    }
}
