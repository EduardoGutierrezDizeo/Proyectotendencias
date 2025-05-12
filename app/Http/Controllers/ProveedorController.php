<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;

class ProveedorController extends Controller
{
    use ValidatesRequests;

    // Mostrar la lista de proveedores
    public function index()
    {
        $proveedores = Proveedor::all();  
        return view('proveedores.index', compact('proveedores'));
    }

    public function create()
    {
        return view('proveedores.create');
    }

    // Almacenar un nuevo proveedor
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:15',
            'correo_electronico' => 'nullable|email',
            'direccion' => 'nullable|string|max:255',
            'estado' => 'required|string',
            'registrado_por' => 'required|string',
        ]);

        Proveedor::create($validated);

        return redirect()->route('proveedores.index')->with('success', 'Proveedor registrado correctamente.');
    }

    // Mostrar el formulario para editar un proveedor
    public function edit(Proveedor $proveedor)
    {
        return view('proveedores.edit', compact('proveedor'));
    }

    // Actualizar un proveedor existente
    public function update(Request $request, Proveedor $proveedor)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:15',
            'correo_electronico' => 'nullable|email',
            'direccion' => 'nullable|string|max:255',
            'estado' => 'required|string',
            'registrado_por' => 'required|string',
        ]);

        $proveedor->update($validated);

        return redirect()->route('proveedores.index')->with('success', 'Proveedor actualizado correctamente.');
    }

    // Eliminar un proveedor
    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();

        return redirect()->route('proveedores.index')->with('success', 'Proveedor eliminado correctamente.');
    }
}
