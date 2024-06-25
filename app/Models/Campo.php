<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campo extends Model
{
    use HasFactory;

    protected $table = 'campos';

    protected $primaryKey = 'codigo_inmueble';

    public $incrementing = true;

    protected $fillable = [
        'superficie',
        'urbanizacion',
        'codigo_inmueble',
    ];

    public $timestamps = false;

    public function inmueble()
    {
        return $this->belongsTo(Inmueble::class, 'codigo_inmueble', 'codigo_inmueble');
    }
}
