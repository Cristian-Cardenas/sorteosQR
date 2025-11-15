<?php

namespace Database\Factories;

use App\Models\Participante;
use Illuminate\Database\Eloquent\Factories\Factory;

class ParticipanteFactory extends Factory
{
    protected $model = Participante::class;

    public function definition(): array
    {
        return [
            'nombre' => fake()->name(),
            'cedula' => fake()->unique()->numerify('##########'), 
            'telefono' => fake()->unique()->phoneNumber(), 
            'correo' => fake()->unique()->safeEmail(),
            
        ];
    }
}