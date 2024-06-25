<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocalComercial extends Model
{
    use HasFactory;

    protected $table = 'locales_comerciales';

    protected $primaryKey = 'codigo_inmueble';

    public $incrementing = false;

    protected $fillable = [
        'area',
        'uso',
        'codigo_inmueble',
    ];

    public $timestamps = false;

    public function inmueble()
    {
        return $this->belongsTo(Inmueble::class, 'codigo_inmueble', 'codigo_inmueble');
    }
}
