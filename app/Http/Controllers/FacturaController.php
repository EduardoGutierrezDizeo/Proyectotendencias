<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Models\Cliente;
use App\Models\Vendedor;
use App\Models\Producto; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;

use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

use Carbon\Carbon;

use Exception;

class FacturaController extends Controller
{
    // Mostrar todas las facturas con detalles y productos relacionados
   public function index()
{

     $facturas = Factura::with(['vendedor', 'detallesFactura.producto'])->get();
    return view('facturas.index', compact('facturas'));
}


    // Mostrar el formulario para crear una nueva factura
    public function create()
    {
        $clientes = Cliente::all();
        $vendedores = Vendedor::all();
        $productos = Producto::all();

        return view('facturas.create', compact('clientes', 'vendedores', 'productos'));
    }

    // Almacenar una nueva factura
    public function store(Request $request)
    {
        
         DB::beginTransaction();

    try {
        $facturaData = $request->all();
        $facturaData['total'] = 0;

        $factura = Factura::create($facturaData);

        $totalFactura = 0;
        foreach ($request->detalles as $detalle) {
            $producto = Producto::findOrFail($detalle['producto_id']);
            $subtotal = $producto->precioVenta * $detalle['cantidad'];
            $totalFactura += $subtotal;
            $factura->detallesFactura()->create([
                'producto_id' => $detalle['producto_id'],
                'cantidad' => $detalle['cantidad'],
                'total' => $subtotal,
                'registradoPor' => Auth::user()->name,
            ]);
        }
        $factura->update(['total' => $totalFactura]);
        $factura = Factura::with(['cliente', 'detallesFactura.producto'])->findOrFail($factura->id);

        if (!file_exists('uploads/facturas')) {
            mkdir('uploads/facturas', 0777, true);
        }

        $timestamp = Carbon::now()->format('YmdHis');
        $nombrePDF = 'uploads/facturas/factura_' . $factura->id . '_' . $timestamp . '.pdf';

        $pdf = Pdf::loadView('facturas.pdf', compact('factura'))->setPaper('letter')->output();
        file_put_contents($nombrePDF, $pdf);

        $factura->update(['ruta_pdf' => $nombrePDF]); 

        DB::commit();

        return redirect()->route('facturas.index')->with('successMsg', 'La factura fue registrada y el PDF generado correctamente.');
    } catch (Exception $e) {
        DB::rollBack();
        return redirect()->back()->with('errorMsg', 'Error al registrar la factura.');
    }

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
        try {
            $factura->delete();
            return redirect()->route('facturas.index')->with('successMsg', 'El registro se eliminó exitosamente');
        } catch (QueryException $e) {
            Log::error('Error al eliminar la factura: ' . $e->getMessage());
            return redirect()->route('facturas.index')->withErrors('El registro que desea eliminar tiene información relacionada. Comuníquese con el Administrador');
        } catch (Exception $e) {
            Log::error('Error inesperado al eliminar la factura: ' . $e->getMessage());
            return redirect()->route('facturas.index')->withErrors('Ocurrió un error inesperado al eliminar el registro. Comuníquese con el Administrador');
        }
    }

    // Cambiar el estado de la factura vía AJAX o similar
    public function cambioestadofactura(Request $request)
    {
        $factura = Factura::find($request->id);
        $factura->estado = $request->estado;
        $factura->save();
    }

    // Mostrar detalle de factura (puedes personalizar la vista después)
    public function show(Factura $factura)
    {
        return "Vista de factura aún no disponible.";
    }

    public function generatePDF($id)
    {
       $factura = Factura::with(['cliente', 'detallesFactura.producto'])->findOrFail($id);


        $pdf = Pdf::loadView('facturas.pdf', compact('factura'))->setPaper('letter');

        return $pdf->stream('factura_' . $factura->id . '.pdf');
    }

        $factura = Factura::with('cliente', 'detallesFactura')->findOrFail($id);

        $pdf = PDF::loadView('factura.facturaPdf', compact('factura'))->setPaper('letter');
		
		return $pdf->stream('factura_' . $factura->id . '.pdf');
    }
}
