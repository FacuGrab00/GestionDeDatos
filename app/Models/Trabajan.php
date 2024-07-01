<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Trabajan extends Model
{
    use HasFactory;

    protected $table = 'trabajan';

    protected $primaryKey = ['DNI', 'codigo_de_agencia'];

    public $incrementing = false;

    protected $fillable = [
        'DNI',
        'codigo_de_agencia',
    ];

    public $timestamps = false;

    public function agenteComercial(): BelongsTo
    {
        return $this->belongsTo(AgenteComercial::class, 'DNI', 'DNI');
    }

    public function agencia(): BelongsTo
    {
        return $this->belongsTo(Agencia::class, 'codigo_de_agencia', 'codigo_de_agencia');
    }
}
