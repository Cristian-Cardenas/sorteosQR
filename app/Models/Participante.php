<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Participante extends Model
{
    use HasFactory;
    protected $fillable = [
        'sorteo_id',
        'tienda_id',
        'nombre',
        'cedula',
        'telefono',
        'correo',
    ];

    public function tienda()
    {
        return $this->belongsTo(Tienda::class);
    }
}
