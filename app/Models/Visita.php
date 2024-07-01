<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visita extends Model
{
    use HasFactory;

    protected $table = 'visitas';

    protected $primaryKey = 'id_visita';

    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'senal',
        'fecha',
        'duracion',
        'DNI_cliente',
        'codigo_cliente',
        'DNI_agente',
        'codigo_inmueble',
        'estado'
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
