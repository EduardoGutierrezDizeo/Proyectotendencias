<?php

namespace Database\Factories;

use App\Models\Pago;
use App\Models\Factura;
use App\Models\Cliente;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PagoFactory extends Factory
{
    protected $model = Pago::class;

    public function definition(): array
    {
        return [
            'factura_id' => Factura::factory(),
            'cliente_id' => Cliente::factory(),
            'monto_pago' => $this->faker->randomFloat(2, 1000, 500000),
            'fecha_pago' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'metodo_pago' => $this->faker->randomElement(['efectivo', 'transferencia', 'tarjeta']),
            'registrado_por' => User::factory(),
        ];
    }
}
