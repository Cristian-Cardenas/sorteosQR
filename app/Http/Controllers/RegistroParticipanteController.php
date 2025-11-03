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

        return view('form_sorteo', compact('sorteo', 'tienda'));
    }

    public function store(Request $request, $slug)
    {
        $qr = QrTienda::where('slug', $slug)->firstOrFail();
        $sorteo_id = $qr->sorteo_id;
        $tienda_id = $qr->tienda_id;

    
        $participanteExistente = Participante::where('sorteo_id', $sorteo_id)
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

        Participante::create([
            'sorteo_id' => $sorteo_id,
            'tienda_id' => $tienda_id,
            'nombre' => $request->nombre,
            'cedula' => $request->cedula,
            'telefono' => $request->telefono,
            'correo' => $request->correo,
        ]);

        return view('exito-registro-sorteo');
    }
}
