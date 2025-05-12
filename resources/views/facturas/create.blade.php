
@extends('layouts.app')

@section('title','Crear Factura')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid"></div>
    </section>

    @include('layouts.partial.msg')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-dark shadow-lg">
                        <div class="card-header bg-dark text-white">
                            <h3>@yield('title')</h3>
                        </div>
                        <form method="POST" action="{{ route('facturas.store') }}">
                            @csrf
                            <div class="card-body" style="background-color: #f5f5f5;">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Nombre Cliente <strong style="color:red;">(*)</strong></label>
                                            <input type="text" class="form-control" name="nombre_cliente" placeholder="Nombre del cliente" value="{{ old('nombre_cliente') }}" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">NIT Cliente <strong style="color:red;">(*)</strong></label>
                                            <input type="text" class="form-control" name="nit_cliente" placeholder="NIT del cliente" value="{{ old('nit_cliente') }}" autocomplete="off">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Teléfono Cliente <strong style="color:red;">(*)</strong></label>
                                            <input type="text" class="form-control" name="telefono_cliente" placeholder="Teléfono del cliente" value="{{ old('telefono_cliente') }}" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Nombre del Negocio <strong style="color:red;">(*)</strong></label>
                                            <input type="text" class="form-control" name="nombre_negocio" placeholder="Nombre del negocio" value="{{ old('nombre_negocio') }}" autocomplete="off">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Fecha Venta <strong style="color:red;">(*)</strong></label>
                                            <input type="date" class="form-control" name="fecha_venta" value="{{ old('fecha_venta') }}" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Estado <strong style="color:red;">(*)</strong></label>
                                            <select class="form-control" name="estado">
                                                <option value="Pendiente" {{ old('estado') == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                                                <option value="Pagado" {{ old('estado') == 'Pagado' ? 'selected' : '' }}>Pagado</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <hr style="border-top: 2px dashed #800080;">

                                <h4 style="color: #800080;">Productos de la Factura</h4>

                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="control-label">Seleccionar Producto <strong style="color:red;">(*)</strong></label>
                                            <select class="form-control" name="producto_id[]" multiple>
                                                @foreach($productos as $producto)
                                                    <option value="{{ $producto->id }}" {{ in_array($producto->id, old('producto_id', [])) ? 'selected' : '' }}>
                                                        {{ $producto->nombre }} - ${{ $producto->precio_venta }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Cantidad <strong style="color:red;">(*)</strong></label>
                                            <input type="number" class="form-control" name="cantidad" placeholder="Cantidad de productos" value="{{ old('cantidad') }}" min="1">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Total Factura <strong style="color:red;">(*)</strong></label>
                                            <input type="number" class="form-control" name="total_factura" placeholder="Total de la factura" value="{{ old('total_factura') }}" step="0.01" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="control-label">Vendedor <strong style="color:red;">(*)</strong></label>
                                            <select class="form-control" name="vendedor_id">
                                                @foreach($vendedores as $vendedor)
                                                    <option value="{{ $vendedor->id }}" {{ old('vendedor_id') == $vendedor->id ? 'selected' : '' }}>
                                                        {{ $vendedor->nombre }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer bg-dark">
                                <div class="row">
                                    <div class="col-lg-2 col-xs-4">
                                        <button type="submit" class="btn btn-primary btn-block btn-flat">Registrar Factura</button>
                                    </div>
                                    <div class="col-lg-2 col-xs-4">
                                        <a href="{{ route('facturas.index') }}" class="btn btn-danger btn-block btn-flat">Atrás</a>
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
