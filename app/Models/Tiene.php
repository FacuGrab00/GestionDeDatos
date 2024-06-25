<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiene extends Model
{
    use HasFactory;

    protected $table = 'tienen_4';

    protected $primaryKey = ['secuencia', 'nombre_zona'];

    public $incrementing = false;

    protected $fillable = [
        'secuencia',
        'nombre_zona',
        'id_ciudad',
    ];

    public $timestamps = false;

    public function zona()
    {
        return $this->belongsTo(Zona::class, ['id_ciudad', 'nombre_zona'], ['id_ciudad', 'nombre']);
    }
}
