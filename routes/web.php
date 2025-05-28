<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\CarteraProveedoresController;
use App\Http\Controllers\CarteraClientesController;
use App\Http\Controllers\PagosController;
use App\Models\Proveedor;
use Illuminate\Support\Facades\Auth;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('productos', ProductoController::class); 
    Route::resource('clientes', ClienteController::class);
    Route::resource('proveedores', ProveedorController::class);
    Route::resource('facturas', FacturaController::class); 
    Route::resource('compras', CompraController::class);
    Route::resource('carteraProveedores', CarteraProveedoresController::class);
    Route::resource('carteraClientes', CarteraClientesController::class);
    Route::resource('pagos', PagosController::class);


    Route::get('facturas/pdf/{id}', [FacturaController::class, 'generatePDF'])->name('facturas.pdf');
    Route::get('cambioestadoproducto', [ProductoController::class, 'cambioestadoproducto'])->name('cambioestadoproducto');
    Route::get('cambioestadocliente', [ClienteController::class, 'cambioestadocliente'])->name('cambioestadocliente');
    Route::get('cambioestadoproveedor', [ProveedorController::class, 'cambioestadoproveedor'])->name('cambioestadoproveedor');
    Route::get('cambioestadofactura', [FacturaController::class, 'cambioestadofactura'])->name('cambioestadofactura');
    Route::get('cambioestadocompra', [CompraController::class, 'cambioestadocompra'])->name('cambioestadocompra');
    Route::get('cambioestadocarteracliente', [CarteraClientesController::class, 'cambioestadocarteracliente'])->name('cambioestadocarteracliente');
    Route::get('cambioestadocarteraproveedor', [CarteraProveedoresController::class, 'cambioestadocarteraproveedor'])->name('cambioestadocarteraproveedor');
    
});

Route::get('/dashboard', function () {
    $clientes = \App\Models\Cliente::count();
    $proveedores = \App\Models\Proveedor::count();
    $facturas = \App\Models\Factura::count();
    $productos = \App\Models\Producto::count();
    $compras = \App\Models\Compra::count();
    $carteraProveedores = \App\Models\CarteraProveedor::count();
    $carteraClientes = \App\Models\CarteraCliente::count();
    $pagos = \App\Models\Pago::count();

    return view('home', compact('clientes', 'proveedores', 'facturas', 'productos', 'compras', 'carteraProveedores', 'carteraClientes', 'pagos'));
})->name('dashboard');

// Route::get('/about', function () {
//     return ('Acerca de nosotros');
// });

// Route::get('/contacto', function () {
//      return ('Página de contacto');
// })->name('contacto');
// Route::get('/user/{id}', function ($id) {
//     return 'ID de usuario: ' . $id;
//    })->where('id', '[0-9]{3}');
  
// Route::prefix('admin')->group(function () {
//     Route::get('/', function () {
//     return 'Panel de administración';
//     });
//     Route::get('/users', function () {
//     return 'Lista de usuarios';
//     });
// });

Auth::routes();