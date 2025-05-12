<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\CompraController;

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

    Route::get('cambioestadofactura', [ClienteController::class, 'cambioestadofactura'])->name('cambioestadofactura');
    Route::get('cambioestadoproveedor', [ClienteController::class, 'cambioestadoproveedor'])->name('cambioestadoproveedor');
    Route::get('cambioestadocliente', [ClienteController::class, 'cambioestadocliente'])->name('cambioestadocliente');
    Route::get('cambioestadoproducto', [ProductoController::class, 'cambioestadoproducto'])->name('cambioestadoproducto');
});

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