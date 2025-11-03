<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participante;
use App\Models\Sorteo;
use App\Models\Tienda;
use App\Models\QrTienda;

class RegistroParticipanteController extends Controller
{
    public function create($slug)
    {
        $qr = QrTienda::where('slug', $slug)->firstOrFail();
        $sorteo_id = $qr->sorteo_id;
        $tienda_id = $qr->tienda_id;

        $sorteo = Sorteo::findOrFail($sorteo_id);
        $tienda = Tienda::findOrFail($tienda_id);

        return view('form_sorteo', compact('sorteo', 'tienda', 'slug'));
    }

    public function store(Request $request, $slug)
    {
        $qr = QrTienda::where('slug', $slug)->firstOrFail();
        $sorteo = Sorteo::findOrFail($qr->sorteo_id);
        $tienda_id = $qr->tienda_id;

        // 1️⃣ Verificar si ya se alcanzó el límite de boletas
        $totalParticipantes = Participante::where('sorteo_id', $sorteo->id)->count();

        if ($totalParticipantes >= $sorteo->boletas) {
            // Mostrar vista de “Sorteo lleno”
            return view('sorteo-lleno', [
                'sorteo' => $sorteo,
            ]);
        }

        $participanteExistente = Participante::where('sorteo_id', $sorteo->id)
            ->where(function ($query) use ($request) {
                $query->where('cedula', $request->cedula)
                    ->orWhere('telefono', $request->telefono)
                    ->orWhere('correo', $request->correo);
            })
            ->first();

        if ($participanteExistente) {
            return view('ya-registrado-sorteo', [
                'participante' => $participanteExistente,
            ]);
        }

        $participante = Participante::create([
            'sorteo_id' => $sorteo->id,
            'tienda_id' => $tienda_id,
            'nombre' => $request->nombre,
            'cedula' => $request->cedula,
            'telefono' => $request->telefono,
            'correo' => $request->correo,
        ]);

        return view('exito-registro-sorteo', compact('participante'));
    }
}
