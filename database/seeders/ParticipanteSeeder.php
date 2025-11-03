<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Participante;
use App\Models\Tienda; // Asegúrate de importar el modelo Tienda
use App\Models\Sorteo; // Asegúrate de importar el modelo Sorteo

class ParticipanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Define el ID del sorteo y las tiendas a usar
        $sorteoId = 1;
        $tiendaIds = [1, 2, 3];
        $totalParticipantes = 30; // Puedes ajustar el número de registros

        // Opcional: Verifica que los registros existan antes de usarlos
        if (!Sorteo::where('id', $sorteoId)->exists()) {
             // Opcional: Lanza una excepción o imprime un mensaje si el sorteo no existe
             return; 
        }

        // 2. Itera para crear los participantes
        for ($i = 0; $i < $totalParticipantes; $i++) {
            // Asigna un tienda_id de forma cíclica (1, 2, 3, 1, 2, 3...)
            $tienda_id = $tiendaIds[$i % count($tiendaIds)];

            Participante::factory()->create([
                'sorteo_id' => $sorteoId, // Siempre 1
                'tienda_id' => $tienda_id, // 1, 2 o 3
                // Los campos 'nombre', 'cedula', 'telefono', 'correo'
                // serán generados automáticamente por el factory
            ]);
        }
    }
}