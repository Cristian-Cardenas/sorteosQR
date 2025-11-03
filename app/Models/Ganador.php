<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ganador extends Model
{
    protected $table = 'ganadors';
    protected $fillable = [
        'sorteo_id',
        'tienda_id',
        'premio_id',
        'participante_id'
    ];
    public function sorteo()
    {
        return $this->belongsTo(Sorteo::class);
    }

    public function premio()
    {
        return $this->belongsTo(Premio::class);
    }

    public function participante()
    {
        return $this->belongsTo(Participante::class);
    }
    public function tienda()
    {
        return $this->belongsTo(Tienda::class);
    }
}
