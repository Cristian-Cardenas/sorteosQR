<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;
class QrTienda extends Model
{
    protected $fillable = [
        'sorteo_id',
        'tienda_id',
        'slug',
        'codigo_qr',
        'url_qr',
    ];
    protected static function booted()
    {
        static::creating(function (QrTienda $qrTienda) {
            if (empty($qrTienda->slug)) {
                $qrTienda->slug = Str::random(100);
            }

            if (empty($qrTienda->codigo_qr)) {
                $qrTienda->codigo_qr = strtoupper(uniqid('QR_'));
            }

            $qrTienda->url_qr = url('/qr/' . $qrTienda->slug);
        });

        static::created(function (QrTienda $qrTienda) {
            $qrImage = QrCode::format('png')
                ->size(300)
                ->margin(2)
                ->errorCorrection('H')
                ->generate($qrTienda->url_qr);

            $filePath = "qrcodes/{$qrTienda->codigo_qr}.png";
            Storage::disk('public')->put($filePath, $qrImage);

            $qrTienda->update([
                'url_qr' => asset("storage/{$filePath}"),
            ]);
        });
    }
    public function sorteo()
    {
        return $this->belongsTo(Sorteo::class);
    }

    public function tienda()
    {
        return $this->belongsTo(Tienda::class);
    }
}
