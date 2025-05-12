<?php

namespace Database\Factories;

use App\Models\DetalleFactura;
use App\Models\Factura;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

class DetalleFacturaFactory extends Factory
{
    protected $model = DetalleFactura::class;

    public function definition(): array
    {
        $cantidad = $this->faker->numberBetween(1, 10);
        $precio = $this->faker->randomFloat(2, 5000, 20000);

        return [
            'factura_id' => Factura::factory(),
            'producto_id' => Producto::factory(),
            'cantidad_producto' => $cantidad,
            'descripcion_producto' => $this->faker->sentence(),
            'valor_unitario' => $precio,
            'subtotal' => $this->faker->randomFloat(2, 10000, 50000),
            'valor_total' => $cantidad * $precio,
            'estado' => $this->faker->boolean(),
            'registrado_por' => 1, // Puedes poner un ID válido o hacer referencia a un User::factory()
        ];
    }
}
