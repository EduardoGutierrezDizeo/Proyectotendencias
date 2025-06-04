<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
use App\Models\Proveedor;

use App\Models\DetalleCompra;
use App\Models\Producto;


use Exception;
use Barryvdh\DomPDF\Facade\Pdf;

class CompraController extends Controller
{

    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        // Cargar compras con los detalles de cada una
        $compras = Compra::with(['detallesCompra'])->get(); // Cargar detalles correctamente

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
    $proveedores = Proveedor::all();
     $productos = Producto::all();

    return view('compras.create', compact('proveedores', 'productos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $request->validate([
        'proveedor_id' => 'required|exists:proveedores,id',
        'fecha_compra' => 'required|date',
        'productos' => 'required|array',
        'estado' => 'required|in:0,1',
        'registrado_por' => 'required|exists:users,id',
    ]);

    $totalCompra = 0;

    // Crear compra
    $compra = Compra::create([
        'proveedor_id' => $request->proveedor_id,
        'fecha_compra' => $request->fecha_compra,
        'estado' => (int) $request->estado,
        'total_compra' => 0,
        'registrado_por' => $request->registrado_por,
    ]);

    // Detalles de compra
    foreach ($request->productos as $productoId => $datos) {
        if (!isset($datos['seleccionado'])) continue;

        $cantidad = max(1, intval($datos['cantidad']));
        $precioUnitario = floatval($datos['precio_unitario']);
        $subtotal = $cantidad * $precioUnitario;

        DetalleCompra::create([
            'compra_id' => $compra->id,
            'producto_id' => $productoId,
            'cantidad' => $cantidad,
            'precio_unitario' => $precioUnitario,
            'subtotal' => $subtotal,
        ]);

        $totalCompra += $subtotal;

        // Actualizar stock
        $producto = Producto::findOrFail($productoId);
        $producto->stock += $cantidad;
        $producto->save();
    }

    // Actualizar total
    $compra->update(['total_compra' => $totalCompra]);

    return redirect()->route('compras.index')->with('success', 'Compra registrada correctamente');
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

    public function generatePDF($id)
    {
        $compra = Compra::with(['proveedor', 'detallesCompra.producto'])->findOrFail($id);

        $pdf = Pdf::loadView('compras.pdf', compact('compra'))->setPaper('letter');

        return $pdf->stream('compra_' . $compra->id . '.pdf');
    }
}
