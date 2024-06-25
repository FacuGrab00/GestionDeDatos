<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preferencia extends Model
{
    use HasFactory;

    protected $table = 'preferencias';

    protected $primaryKey = null;

    public $incrementing = false;

    protected $fillable = [
        'secuencia',
        'fecha',
        'numero_de_habitaciones',
        'precio_maximo',
        'precio_minimo',
        'tipo',
        'DNI',
    ];

    protected $dates = ['fecha'];

    public $timestamps = false;

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'DNI', 'DNI');
    }
}
