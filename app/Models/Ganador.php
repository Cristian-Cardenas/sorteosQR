<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ganador extends Model
{
    protected $fillable = [
        'sorteo_id',
        'tienda_id',
        'participante_id'
    ];
}
