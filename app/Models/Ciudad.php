<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    use HasFactory;

    protected $table = 'ciudades';

    protected $primaryKey = 'id_ciudad';

    public $incrementing = true;

    protected $fillable = [
        'nombre',
    ];

    public $timestamps = false;

     public function zonas()
     {
         return $this->hasMany(Zona::class, 'id_ciudad', 'id_ciudad');
     }
}
