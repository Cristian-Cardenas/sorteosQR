<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;
use App\Models\QrTienda;
use App\Models\Tienda;

class Sorteo extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'boletas',
        'estado',
    ];
    protected static function booted()
    {
        static::created(function (Sorteo $sorteo) {
            $tiendas = Tienda::all();

            foreach ($tiendas as $tienda) {
                // Generar un código único y URL
                $codigo = strtoupper(uniqid('QR_'));
                $slug = \Illuminate\Support\Str::random(100);
                $url = url('/qr/' . $slug);

                $qrImage = QrCode::format('png')
                    ->size(300)
                    ->margin(2)
                    ->errorCorrection('H')
                    ->generate($url);

                $filePath = "qrcodes/{$codigo}.png";
                Storage::disk('public')->put($filePath, $qrImage);

                QrTienda::create([
                    'sorteo_id' => $sorteo->id,
                    'tienda_id' => $tienda->id,
                    'slug' => $slug,
                    'codigo_qr' => $codigo,
                    'url_qr' => asset("storage/{$filePath}"),
                ]);
            }
        });
    }
    public function premios()
    {
        return $this->hasMany(Premio::class);
    }

    public function participantes()
    {
        return $this->hasMany(Participante::class);
    }

    public function ganadores()
    {
        return $this->hasMany(Ganador::class);
    }

    public function qrTiendas()
    {
        return $this->hasMany(QrTienda::class);
    }


    public function tiendas()
    {
        return $this->hasManyThrough(Tienda::class, QrTienda::class, 'sorteo_id', 'id', 'id', 'tienda_id');
    }


}
