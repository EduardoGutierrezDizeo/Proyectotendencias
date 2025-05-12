<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    protected $model = Cliente::class;

    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name,
            'nit' => $this->faker->unique()->numerify('##########'),
            'telefono' => $this->faker->phoneNumber,
            'direccion' => $this->faker->address,
            'correo_electronico' => $this->faker->safeEmail,
            'nombre_negocio' => $this->faker->company,
            'estado' => $this->faker->boolean(),
            'registrado_por' => 1,
        ];
    }
}
