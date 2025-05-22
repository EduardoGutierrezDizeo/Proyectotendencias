<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PagoFactory extends Factory
{
    public function definition()
    {
        return [
            'factura_id' => \App\Models\Factura::inRandomOrder()->first()->id,
            'monto_pago' => $this->faker->randomFloat(2, 10, 2000),
            'fecha_pago' => $this->faker->dateTimeThisMonth,
            'estado' => $this->faker->boolean(),
            'registrado_por' => \App\Models\User::inRandomOrder()->first()->id,
        ];
    }
}