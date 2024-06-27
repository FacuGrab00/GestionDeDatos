<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preferencia extends Model
{
    use HasFactory;

    protected $table = 'preferencias';

    protected $primaryKey = ['DNI', 'codigo_cliente', 'secuencia'];

    public $incrementing = false;

    protected $fillable = [
        'secuencia',
        'DNI',
        'codigo_cliente',
        'fecha',
        'numero_de_habitaciones',
        'precio_maximo',
        'precio_minimo',
        'tipo',
    ];

    public $timestamps = false;

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, ['DNI', 'codigo_cliente'], ['DNI', 'codigo_cliente']);
    }
}
