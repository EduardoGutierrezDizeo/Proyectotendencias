<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Cliente;
use App\Models\Proveedor;
use App\Models\Producto;
use App\Models\Factura;
use App\Models\DetalleFactura;
use App\Models\Pago;
use App\Models\Compra;
use App\Models\DetalleCompra;
use App\Models\Vendedor;
use App\Models\CarteraCliente;
use App\Models\CarteraProveedor;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear usuarios
        User::factory(10)->create();

        // Crear vendedores
        Vendedor::factory(5)->create();

        // Crear proveedores
        Proveedor::factory(10)->create();

        // Crear clientes
        Cliente::factory(15)->create();

        // Crear productos
        Producto::factory(50)->create();

        // Crear compras y detalles de compra
        Compra::factory(30)->create();
        DetalleCompra::factory(60)->create(); // 2 detalles por compra aprox.

        // Crear facturas y detalles de factura
        Factura::factory(40)->create();
        DetalleFactura::factory(80)->create(); // 2 detalles por factura aprox.

        // Crear pagos
        Pago::factory(50)->create();

        // Crear carteras
        CarteraCliente::factory(20)->create();
        CarteraProveedor::factory(20)->create();
    }
}
