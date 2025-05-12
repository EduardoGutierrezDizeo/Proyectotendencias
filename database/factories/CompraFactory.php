<?php

namespace Database\Factories;

use App\Models\Compra;
use App\Models\Proveedor;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompraFactory extends Factory
{
    protected $model = Compra::class;

    public function definition(): array
    {
        return [
            'proveedor_id' => Proveedor::factory(),
            'fecha_compra' => $this->faker->dateTimeBetween('-6 months', 'now'),
            'total_compra' => $this->faker->randomFloat(2, 50000, 1000000),
            'estado_pago' => $this->faker->boolean(),
            'registrado_por' => User::factory(),
        ];
    }
}
