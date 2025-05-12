<?php

namespace Database\Factories;

use App\Models\Factura;
use App\Models\Cliente;
use App\Models\Vendedor;
use Illuminate\Database\Eloquent\Factories\Factory;

class FacturaFactory extends Factory
{
    protected $model = Factura::class;

    public function definition(): array
    {
        return [
            'nombre_cliente' => $this->faker->name,
            'nit_cliente' => $this->faker->numerify('#########'),
            'telefono_cliente' => $this->faker->phoneNumber,
            'nombre_negocio' => $this->faker->company,
            'ruta' => $this->faker->streetName,
            'fecha_venta' => $this->faker->dateTimeThisYear(),
            'total_factura' => $this->faker->randomFloat(2, 50000, 100000),
            'cliente_id' => Cliente::factory(),
            'vendedor_id' => Vendedor::factory(),
            'estado' => $this->faker->boolean(),
            'registrado_por' => \app\Models\User::factory(),
        ];
    }
}
