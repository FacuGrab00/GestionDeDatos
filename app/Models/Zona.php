<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    use HasFactory;

    protected $table = 'zonas';

    protected $primaryKey = ['id_ciudad', 'nombre'];

    public $incrementing = false;

    protected $fillable = [
        'id_ciudad',
        'nombre',
        'codigo_de_agencia',
    ];

    public $timestamps = false;

    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class, 'id_ciudad', 'id_ciudad');
    }

    public function agencia()
    {
        return $this->belongsTo(Agencia::class, 'codigo_de_agencia', 'codigo_de_agencia');
    }
}
