<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Registran extends Model
{
    use HasFactory;

    protected $table = 'registran';
    protected $primaryKey = ['codigo_de_agencia', 'DNI_cliente', 'codigo_cliente', 'DNI_agente'];
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'codigo_de_agencia',
        'DNI_cliente',
        'codigo_cliente',
        'DNI_agente',
        'fecha_registro',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'DNI_cliente', 'DNI');
    }

    public function agente()
    {
        return $this->belongsTo(AgenteComercial::class, 'DNI_agente', 'DNI');
    }

    public function agencia()
    {
        return $this->belongsTo(Agencia::class, 'codigo_de_agencia', 'codigo_de_agencia');
    }
}
