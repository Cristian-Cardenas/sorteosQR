<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tienda extends Model
{
    protected $fillable = [
        'nombre',
    ];
    public function qrTiendas()
    {
        return $this->hasMany(QrTienda::class);
    }


}