<?php

namespace Database\Factories;

use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    protected $model = Producto::class;

    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name(),
            'descripcion' => $this->faker->text,
            'registrado_por'=> \app\Models\User::factory(),
            'precio_compra' => $this->faker->randomFloat(2, 100, 1000),
            'precio_venta' => $this->faker->randomFloat(2, 1100, 2000),
            'stock' => $this->faker->numberBetween(0, 100),
            'categoria' => $this->faker->randomElement(['Aseo', 'Comida', 'Electrónica']),
            'estado' => $this->faker->boolean(),
            'proveedor_id' => \App\Models\Proveedor::inRandomOrder()->first()?->id ?? 1,
        ];
    }
}
