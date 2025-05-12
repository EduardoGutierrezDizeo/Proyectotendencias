<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Proveedor;
use App\Models\Factura;
use App\Models\Producto;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $clientes = Cliente::count();
        $proveedores = Proveedor::count();
        $facturas = Factura::count();
        $productos = Producto::count();

        return view('home', compact('clientes', 'proveedores', 'facturas', 'productos'));
    }
}
