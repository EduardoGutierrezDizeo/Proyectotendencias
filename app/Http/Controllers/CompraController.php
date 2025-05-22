<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
use Exception;

class CompraController extends Controller
{

    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        // Cargar compras con los detalles de cada una
    $compras = Compra::with(['detalleCompras'])->get(); // Cargar detalles correctamente

    // Verificar que no esté vacío antes de pasar a la vista
    if ($compras->isEmpty()) {
        Log::error('No se encontraron compras.');
    }

    return view('compras.index', compact('compras'));
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Compra $compra)
    {
        try {
            $compra->delete();
            return redirect()->route('compras.index')->with('successMsg', 'El registro se eliminó exitosamente');
        } catch (QueryException $e) {
            // Capturar y manejar violaciones de restricción de clave foránea
            Log::error('Error al eliminar el país: ' . $e->getMessage());
            return redirect()->route('compras.index')->withErrors('El registro que desea eliminar tiene información relacionada. Comuníquese con el Administrador');
        } catch (Exception $e) {
            // Capturar y manejar cualquier otra excepción
            Log::error('Error inesperado al eliminar el país: ' . $e->getMessage());
            return redirect()->route('compras.index')->withErrors('Ocurrió un error inesperado al eliminar el registro. Comuníquese con el Administrador');
        }
    }

    public function cambioestadocompra(Request $request)
    {
        $compra = Compra::find($request->id);
        $compra->estado = $request->estado;
        $compra->save();
    }
}
