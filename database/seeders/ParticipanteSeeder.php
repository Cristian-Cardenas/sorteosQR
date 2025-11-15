<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Participante;
use App\Models\Tienda; 
use App\Models\Sorteo;

class ParticipanteSeeder extends Seeder
{
    public function run(): void
    {
        $sorteoId = 3;
        $totalParticipantes = 30;

        $tiendaIds = Tienda::pluck('id')->toArray();

        if (empty($tiendaIds)) {
            echo "No hay tiendas creadas.\n";
            return;
        }

        if (!Sorteo::where('id', $sorteoId)->exists()) {
            echo "El sorteo no existe.\n";
            return;
        }

        for ($i = 0; $i < $totalParticipantes; $i++) {
            Participante::factory()->create([
                'sorteo_id' => $sorteoId,
                'tienda_id' => $tiendaIds[$i % count($tiendaIds)], 
            ]);
        }
    }
}
