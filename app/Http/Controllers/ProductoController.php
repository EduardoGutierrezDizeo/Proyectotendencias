<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Support\Facades\Auth; // Importar Auth para obtener el usuario autenticado
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
use Exception;

class ProductoController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtener todos los proveedores
        $proveedores = Proveedor::all();

        // Definir las categorías como un array en el controlador
        $categorias = ['Comida', 'Bebidas', 'Enlatados'];  // Ejemplo de categorías

        // Pasar las categorías y proveedores a la vista
        return view('productos.create', compact('proveedores', 'categorias'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de los datos
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio_compra' => 'required|numeric',
            'precio_venta' => 'required|numeric',
            'stock' => 'required|integer',
            'categoria' => 'required|string|in:Comida,Bebidas,Enlatados', // Validar que la categoría esté dentro de las opciones
            'proveedor_id' => 'required|exists:proveedores,id',  // Asegura que el proveedor exista en la base de datos
            'estado' => 'required|boolean',  // Si 'estado' es un campo booleano (activo/inactivo)
            // 'registrado_por' no se valida, ya que será añadido automáticamente
        ]);

        // Agregar el 'registrado_por' con el ID del usuario autenticado
        $validated['registrado_por'] = Auth::user()->id;

        // Crear el producto con los datos validados
        Producto::create($validated);

        // Redirigir a la lista de productos con mensaje de éxito
        return redirect()->route('productos.index')->with('successMsg', 'El registro se guardó exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        try {
            $producto->delete();
            return redirect()->route('productos.index')->with('successMsg', 'El registro se eliminó exitosamente');
        } catch (QueryException $e) {
            // Capturar y manejar violaciones de restricción de clave foránea
            Log::error('Error al eliminar el país: ' . $e->getMessage());
            return redirect()->route('productos.index')->withErrors('El registro que desea eliminar tiene información relacionada. Comuníquese con el Administrador');
        } catch (Exception $e) {
            // Capturar y manejar cualquier otra excepción
            Log::error('Error inesperado al eliminar el país: ' . $e->getMessage());
            return redirect()->route('productos.index')->withErrors('Ocurrió un error inesperado al eliminar el registro. Comuníquese con el Administrador');
        }
    }

    public function cambioestadoproducto(Request $request)
    {
        $producto = Producto::find($request->id);
        $producto->estado = $request->estado;
        $producto->save();
    }
}
