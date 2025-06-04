@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 90vh;">
    <div class="container bg-white p-4 rounded shadow border" style="max-width: 700px;">

        <h2 class="text-center text-danger mb-4">Registrar Compra</h2>

        <form action="{{ route('compras.store') }}" method="POST">
            @csrf

            {{-- Proveedor y Fecha --}}
            <div class="row mb-3">
                <div class="col-6">
                    <label class="form-label fw-bold">Proveedor</label>
                    <select name="proveedor_id" class="form-control select2" required>
                        <option value="">Seleccione un proveedor</option>
                        @foreach($proveedores as $proveedor)
                            <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-6">
                    <label class="form-label fw-bold">Fecha de Compra</label>
                    <input type="date" name="fecha_compra" class="form-control" required>
                </div>
            </div>

            {{-- Productos dinámicos --}}
            <div class="mb-3">
                <label class="form-label fw-bold">Productos</label>
                <select class="form-control select2" name="productos_ids[]" multiple="multiple" id="productos_select">
                    @foreach($productos as $producto)
                        <option 
                            value="{{ $producto->id }}" 
                            data-nombre="{{ $producto->nombre }}" 
                            data-stock="{{ $producto->stock }}"
                        >
                            {{ $producto->nombre }} (Stock: {{ $producto->stock }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div id="productos_detalles" class="mb-3"></div>

            {{-- Estado --}}
            <div class="mb-3">
                <label class="form-label fw-bold">Estado de Pago</label>
                <select name="estado" class="form-select">
                    <option value="0">Pendiente</option>
                    <option value="1">Pagado</option>
                </select>
            </div>

            <input type="hidden" name="registrado_por" value="{{ Auth::user()->id }}">

            {{-- Botones --}}
            <div class="text-center mt-4">
                <a href="{{ route('compras.index') }}" class="btn btn-outline-pink btn-sm me-2" style="background-color: #f8d7da; border-color: #f5c2c7; color: #842029;">
                    <i class="bi bi-arrow-left-circle"></i> Atrás
                </a>
                <button type="submit" class="btn btn-danger btn-sm">
                    <i class="bi bi-save"></i> Guardar Compra
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('.select2').select2({
            width: '100%',
            placeholder: 'Seleccione productos',
            allowClear: true
        });

        $('#productos_select').on('change', function() {
            const selected = $(this).val();
            let html = '';

            // Para evitar duplicados si se deselecciona un producto
            const selectedSet = new Set(selected);

            // Limpio el contenedor para volver a generar los campos
            $('#productos_detalles').empty();

            if(selected && selected.length > 0) {
                // Recorremos las opciones seleccionadas y buscamos sus atributos data
                $('#productos_select option:selected').each(function() {
                    const id = $(this).val();
                    const nombre = $(this).data('nombre');
                    const stock = $(this).data('stock');

                    // Generamos el bloque para cada producto
                    html += `
                        <div class="border rounded p-2 mb-2">
                            <strong>${nombre}</strong><br>
                            <input type="hidden" name="productos[${id}][id]" value="${id}">
                            <label class="form-label fw-bold">Precio Compra</label>
                            <input type="number" name="productos[${id}][precio_compra]" step="0.01" class="form-control form-control-sm mb-2" required>
                            <label class="form-label fw-bold">Cantidad</label>
                            <input type="number" name="productos[${id}][cantidad]" min="1" class="form-control form-control-sm" required>
                        </div>
                    `;
                });

                $('#productos_detalles').html(html);
            }
        });
    });
</script>
@endsection
