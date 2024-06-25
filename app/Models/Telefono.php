<?php

namespace App\Models;

use App\Models\Models\Persona;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{
    use HasFactory;

    protected $table = 'telefonos';

    protected $primaryKey = ['DNI', 'num_tel'];

    public $incrementing = false;

    protected $fillable = [
        'num_tel',
        'cod_area',
        'DNI',
    ];

    public $timestamps = false;

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'DNI', 'DNI');
    }
}
