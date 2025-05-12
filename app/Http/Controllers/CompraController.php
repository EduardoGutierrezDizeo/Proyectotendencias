<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompraController extends Controller
{
    // Mostrar todas las compras
    public function index()
    {
        $compras = Compra::with('proveedor')->get();
        return view('compras.index', compact('compras'));
    }

    // Mostrar el formulario para crear una nueva compra
    public function create()
    {
        $proveedores = Proveedor::all();
        return view('compras.create', compact('proveedores'));
    }

    // Guardar una nueva compra
    public function store(Request $request)
    {
        $request->validate([
            'proveedor_id' => 'required|exists:proveedores,id',
            'fecha_compra' => 'required|date',
            'total_compra' => 'required|numeric',
            'estado_pago' => 'required|string|max:255',
        ]);

        Compra::create([
            'proveedor_id' => $request->proveedor_id,
            'fecha_compra' => $request->fecha_compra,
            'total_compra' => $request->total_compra,
            'estado_pago' => $request->estado_pago,
            'registrado_por' => Auth::id(),
        ]);

        return redirect()->route('compras.index')->with('success', 'Compra registrada con éxito');
    }

    // Mostrar formulario para editar una compra
    public function edit(Compra $compra)
    {
        $proveedores = Proveedor::all();
        return view('compras.edit', compact('compra', 'proveedores'));
    }

    // Actualizar la compra
    public function update(Request $request, Compra $compra)
    {
        $request->validate([
            'proveedor_id' => 'required|exists:proveedores,id',
            'fecha_compra' => 'required|date',
            'total_compra' => 'required|numeric',
            'estado_pago' => 'required|string|max:255',
        ]);

        $compra->update([
            'proveedor_id' => $request->proveedor_id,
            'fecha_compra' => $request->fecha_compra,
            'total_compra' => $request->total_compra,
            'estado_pago' => $request->estado_pago,
        ]);

        return redirect()->route('compras.index')->with('success', 'Compra actualizada con éxito');
    }

    // Eliminar una compra
    public function destroy(Compra $compra)
    {
        $compra->delete();
        return redirect()->route('compras.index')->with('success', 'Compra eliminada con éxito');
    }
}
