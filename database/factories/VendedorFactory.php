<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VendedorFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name,
            'telefono' => $this->faker->phoneNumber,
            'correo_electronico' => $this->faker->safeEmail,
            'fecha_registro' => $this->faker->date(),
            'estado' => $this->faker->boolean(),
            'registrado_por' => 'admin',
        ];
    }
}
