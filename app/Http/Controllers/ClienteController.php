<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
use Exception;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    public function create()
    {
        return view('clientes.create');
    }

    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'estado' => 'required|string',
        ]);

        try {
            Cliente::create([
                'nombre' => $request->nombre,
                'telefono' => $request->telefono,
                'direccion' => $request->direccion,
                'nit' => $request->nit,
                'correo_electronico' => $request->correo_electronico,
                'credito_disponible' => $request->credito_disponible ?? 0,
                'deuda_actual' => $request->deuda_actual ?? 0,
                'estado' => $request->estado,
                'registrado_por' => Auth::user()->name,
                'nombre_negocio' => $request->nombre_negocio,
            ]);

            return redirect()->route('clientes.index')->with('successMsg', 'El cliente fue registrado exitosamente');
        } catch (Exception $e) {
            Log::error('Error al crear cliente: ' . $e->getMessage());
            return redirect()->back()->withErrors('Ocurrió un error al guardar el cliente. Intenta nuevamente.');
        }
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(Cliente $cliente)
    {
        try {
            $cliente->delete();
            return redirect()->route('clientes.index')->with('successMsg', 'El cliente fue eliminado exitosamente');
        } catch (QueryException $e) {
            Log::error('Error al eliminar cliente: ' . $e->getMessage());
            return redirect()->route('clientes.index')->withErrors('El cliente tiene información relacionada. No puede ser eliminado.');
        } catch (Exception $e) {
            Log::error('Error inesperado al eliminar cliente: ' . $e->getMessage());
            return redirect()->route('clientes.index')->withErrors('Ocurrió un error inesperado al eliminar el cliente.');
        }
    }

    public function cambioestadocliente(Request $request)
    {
        $cliente = Cliente::find($request->id);
        $cliente->estado = $request->estado;
        $cliente->save();
    }
}
