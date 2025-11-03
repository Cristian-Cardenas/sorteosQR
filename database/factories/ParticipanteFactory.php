<?php

namespace Database\Factories;

use App\Models\Participante;
use Illuminate\Database\Eloquent\Factories\Factory;

class ParticipanteFactory extends Factory
{
    /**
     * El nombre del factory del modelo correspondiente.
     *
     * @var string
     */
    protected $model = Participante::class;

    /**
     * Define el estado predeterminado del modelo.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->name(),
            // Genera una cédula/identificación única
            'cedula' => fake()->unique()->numerify('##########'), 
            // Genera un número de teléfono único
            'telefono' => fake()->unique()->phoneNumber(), 
            'correo' => fake()->unique()->safeEmail(),
            
            // Los campos 'sorteo_id' y 'tienda_id' los dejaremos fuera de aquí,
            // ya que se anulan en el Seeder para fijar sus valores.
        ];
    }
}