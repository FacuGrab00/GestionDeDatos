<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    protected $primaryKey = ['DNI', 'codigo_cliente'];

    public $incrementing = false;

    protected $fillable = [
        'DNI',
        'fecha_registro',
        'codigo_cliente',
    ];

    protected $dates = [
        'fecha_registro',
    ];

    public $timestamps = false;

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'DNI', 'DNI');
    }
}
