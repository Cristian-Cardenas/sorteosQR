<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participante extends Model
{
    protected $fillable = [
        'sorteo_id',
        'tienda_id',
        'nombre',
        'cedula',
        'telefono',
        'correo',
    ];
}
