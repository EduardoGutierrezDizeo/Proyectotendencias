<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Models\Cliente;
use App\Models\Vendedor;
use App\Models\Producto; // ← ¡Aquí importamos el modelo Producto!
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    // Mostrar todas las facturas
    public function index()
    {
        $facturas = Factura::with('cliente', 'vendedor')->get();
        return view('facturas.index', compact('facturas'));
    }

    // Mostrar el formulario para crear una nueva factura
    public function create()
    {
        $clientes = Cliente::all();
        $vendedores = Vendedor::all();
        $productos = Producto::all(); // ← ¡Aquí traemos los productos!

        return view('facturas.create', compact('clientes', 'vendedores', 'productos'));
    }

    // Almacenar una nueva factura
    public function store(Request $request)
    {
        $request->validate([
            'nombre_cliente' => 'required|string|max:255',
            'nit_cliente' => 'nullable|string|max:255',
            'telefono_cliente' => 'nullable|string|max:15',
            'nombre_negocio' => 'required|string|max:255',
            'fecha_venta' => 'required|date',
            'total_factura' => 'required|numeric',
            'cliente_id' => 'required|exists:clientes,id',
            'vendedor_id' => 'required|exists:vendedores,id',
            'estado' => 'required|string|max:255',
            'registrado_por' => 'required|string|max:255',
        ]);

        Factura::create($request->all());

        return redirect()->route('facturas.index')->with('success', 'Factura registrada con éxito');
    }

    // Mostrar el formulario para editar una factura
    public function edit(Factura $factura)
    {
        $clientes = Cliente::all();
        $vendedores = Vendedor::all();
        return view('facturas.edit', compact('factura', 'clientes', 'vendedores'));
    }

    // Actualizar una factura existente
    public function update(Request $request, Factura $factura)
    {
        $request->validate([
            'nombre_cliente' => 'required|string|max:255',
            'nit_cliente' => 'nullable|string|max:255',
            'telefono_cliente' => 'nullable|string|max:15',
            'nombre_negocio' => 'required|string|max:255',
            'fecha_venta' => 'required|date',
            'total_factura' => 'required|numeric',
            'cliente_id' => 'required|exists:clientes,id',
            'vendedor_id' => 'required|exists:vendedores,id',
            'estado' => 'required|string|max:255',
            'registrado_por' => 'required|string|max:255',
        ]);

        $factura->update($request->all());

        return redirect()->route('facturas.index')->with('success', 'Factura actualizada con éxito');
    }

    // Eliminar una factura
    public function destroy(Factura $factura)
    {
        $factura->delete();

        return redirect()->route('facturas.index')->with('success', 'Factura eliminada con éxito');
    }
}
