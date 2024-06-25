<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $table = 'personas';
    protected $primaryKey = 'DNI';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'direccion',
        'nombre',
        'DNI',
    ];
}
