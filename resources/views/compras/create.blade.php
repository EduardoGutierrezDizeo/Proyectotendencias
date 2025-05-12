@extends('layouts.app')

@section('title','Registrar Compra')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h1 class="m-0" style="color: #f1f1f1;">Registrar Compra</h1>
        </div>
    </section>
    
    @include('layouts.partial.msg')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow-lg" style="background-color: #1d1d1d; color: #f1f1f1;">
                        <div class="card-header bg-purple" style="background-color: #9b59b6; color: white;">
                            <h3 class="card-title" style="font-size: 1.75rem; font-weight: 600;">@yield('title')</h3>
                        </div>
                        <form method="POST" action="{{ route('compras.store') }}">
                            @csrf
                            <div class="card-body bg-dark">
                                
                                <!-- Proveedor -->
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Proveedor <strong style="color:red;">(*)</strong></label>
                                            <select class="form-control" name="proveedor_id" required>
                                                <option value="">Seleccione un Proveedor</option>
                                                @foreach($proveedores as $proveedor)
                                                    <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Fecha de Compra -->
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Fecha de Compra <strong style="color:red;">(*)</strong></label>
                                            <input type="date" class="form-control" name="fecha_compra" required value="{{ old('fecha_compra') }}">
                                        </div>
                                    </div>
                                </div>

                                <!-- Productos -->
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Productos <strong style="color:red;">(*)</strong></label>
                                            <select class="form-control" name="productos[]" multiple required>
                                                @foreach($productos as $producto)
                                                    <option value="{{ $producto->id }}">{{ $producto->nombre }} - ${{ number_format($producto->precio_compra, 2) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Cantidades -->
                                <div class="row" id="cantidad-row">
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Cantidad de Productos <strong style="color:red;">(*)</strong></label>
                                            <input type="number" class="form-control" id="cantidad" name="cantidad[]" placeholder="Cantidad de producto" required>
                                        </div>
                                    </div>
                                </div>

                                <!-- Total de la compra -->
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Total de la Compra <strong style="color:red;">(*)</strong></label>
                                            <input type="number" step="0.01" class="form-control" name="total_compra" id="total_compra" placeholder="Total de la compra" readonly>
                                        </div>
                                    </div>
                                </div>

                                <!-- Estado de Pago -->
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Estado de Pago <strong style="color:red;">(*)</strong></label>
                                            <select class="form-control" name="estado_pago" required>
                                                <option value="pendiente">Pendiente</option>
                                                <option value="pagado">Pagado</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" class="form-control" name="registrado_por" value="{{ Auth::user()->id }}">

                            </div>

                            <div class="card-footer bg-dark">
                                <div class="row">
                                    <div class="col-lg-2 col-xs-4">
                                        <button type="submit" class="btn btn-primary btn-block btn-flat" style="background-color: #9b59b6; color: white;">
                                            Registrar Compra
                                        </button>
                                    </div>
                                    <div class="col-lg-2 col-xs-4">
                                        <a href="{{ route('compras.index') }}" class="btn btn-danger btn-block btn-flat">
                                            Atrás
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@section('scripts')
    <script>
        // Actualiza el total de la compra al cambiar las cantidades o productos
        document.querySelector('[name="productos[]"]').addEventListener('change', updateTotal);
        document.querySelector('[name="cantidad[]"]').addEventListener('input', updateTotal);

        function updateTotal() {
            let totalCompra = 0;
            let cantidades = document.querySelectorAll('[name="cantidad[]"]');
            let productos = document.querySelectorAll('[name="productos[]"]');

            for (let i = 0; i < productos.length; i++) {
                let precio = parseFloat(productos[i].options[productos[i].selectedIndex].getAttribute('data-precio'));
                let cantidad = parseInt(cantidades[i].value);
                totalCompra += precio * cantidad;
            }

            document.getElementById('total_compra').value = totalCompra.toFixed(2);
        }
    </script>
@endsection
