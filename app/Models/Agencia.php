<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agencia extends Model
{
    use HasFactory;

    protected $table = 'agencias';

    protected $primaryKey = 'codigo_de_agencia';

    public $incrementing = false;

    protected $fillable = [
        'codigo_de_agencia',
        'direccion',
        'telefono',
        'director',
        'id_ciudad',
    ];

    public $timestamps = false;

    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class, 'id_ciudad', 'id_ciudad');
    }

    public function director()
    {
        return $this->belongsTo(AgenteComercial::class, 'director', 'DNI');
    }
}
