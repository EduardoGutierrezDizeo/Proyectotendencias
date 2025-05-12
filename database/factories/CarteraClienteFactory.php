<?php

namespace Database\Factories;

use App\Models\CarteraCliente;
use App\Models\Cliente;
use App\Models\Factura;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarteraClienteFactory extends Factory
{
    protected $model = CarteraCliente::class;

    public function definition(): array
    {
        return [
            'cliente_id' => Cliente::inRandomOrder()->first()?->id ?? Cliente::factory(),
            'factura_id' => Factura::inRandomOrder()->first()?->id ?? Factura::factory(),
            'saldo_pendiente' => $this->faker->randomFloat(2, 10000, 100000),
            'fecha_limite' => $this->faker->dateTimeBetween('now', '+2 months'),
            'estado' => $this->faker->boolean(),
        ];
    }
}

