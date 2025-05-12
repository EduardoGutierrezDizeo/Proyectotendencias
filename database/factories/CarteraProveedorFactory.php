<?php

namespace Database\Factories;

use App\Models\CarteraProveedor;
use App\Models\Proveedor;
use App\Models\Compra;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarteraProveedorFactory extends Factory
{
    protected $model = CarteraProveedor::class;

    public function definition(): array
    {
        return [
            'proveedor_id' => Proveedor::factory(),
            'compra_id' => Compra::factory(),
            'saldo_pendiente' => $this->faker->randomFloat(2, 20000, 300000),
            'fecha_limite' => $this->faker->dateTimeBetween('+5 days', '+30 days'),
            'estado' => $this->faker->boolean(),
            'cuenta_por_pagar' => $this->faker->randomFloat(2, 1000, 500000),
        ];
    }
}
