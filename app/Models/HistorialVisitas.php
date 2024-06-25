<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialVisitas extends Model
{
    use HasFactory;

    protected $table = 'historial_visitas';

    protected $primaryKey = 'id_historial';

    public $incrementing = true;

    protected $fillable = [
        'senal',
        'fecha',
        'duracion',
    ];

    public $timestamps = false;
}
