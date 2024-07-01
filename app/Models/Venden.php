<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Venden extends Model
{
    protected $table = 'venden';

    protected $primaryKey = ['DNI_cliente', 'codigo_cliente', 'DNI_agente', 'codigo_inmueble'];

    public $incrementing = false;

    protected $fillable = [
        'DNI_cliente',
        'codigo_cliente',
        'DNI_agente',
        'codigo_inmueble',
        'fecha_venta',
    ];

    protected $dates = [
        'fecha_venta',
    ];

    public $timestamps = false;

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class, ['DNI_cliente', 'codigo_cliente'], ['DNI', 'codigo_cliente']);
    }

    public function agenteComercial(): BelongsTo
    {
        return $this->belongsTo(AgenteComercial::class, 'DNI_agente', 'DNI');
    }

    public function inmueble(): BelongsTo
    {
        return $this->belongsTo(Inmueble::class, 'codigo_inmueble', 'codigo_inmueble');
    }
}
