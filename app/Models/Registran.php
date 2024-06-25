<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registran extends Model
{
    use HasFactory;

    protected $table = 'registran';

    public $incrementing = false;

    protected $fillable = [
        'codigo_de_agencia',
        'DNI',
        'DNI_agente',
    ];

    public $timestamps = false;

    public function agencia()
    {
        return $this->belongsTo(Agencia::class, 'codigo_de_agencia', 'codigo_de_agencia');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'DNI', 'DNI');
    }

    public function agenteComercial()
    {
        return $this->belongsTo(AgenteComercial::class, 'DNI_agente', 'DNI');
    }
}
