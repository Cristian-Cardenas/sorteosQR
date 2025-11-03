<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Premio extends Model
{
    protected $fillable = [
        'sorteo_id',
        'nombre',
        'descripcion',
        'orden',
    ];
}
