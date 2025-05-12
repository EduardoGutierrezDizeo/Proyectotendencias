<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProveedorFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->company,
            'telefono' => $this->faker->phoneNumber,
            'direccion' => $this->faker->address,
            'correo_electronico' => $this->faker->safeEmail,
            'estado' => $this->faker->boolean(),
            'registrado_por' => 'admin',
        ];
    }
}
