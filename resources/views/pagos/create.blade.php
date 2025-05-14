@extends('layouts.app')

@section('title', 'Crear Cliente')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
            </div>
        </section>
        @include('layouts.partial.msg')
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-secondary">
                                <h3>@yield('title')</h3>
                            </div>
                            <form method="POST" action="{{ route('pagos.store') }}">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>numero de factura <strong style="color:red;">(*)</strong></label>
                                                <input type="text" class="form-control" name="factura_id"
                                                    placeholder="ingrese el numero de la factura"
                                                    value="{{ old('factura_id') }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>numero de cliente <strong style="color:red;">(*)</strong></label>
                                                <input type="text" class="form-control" name="cliente_id"
                                                    placeholder="ingrese el numero del cliente"
                                                    value="{{ old('cliente_id') }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Monto del pago <strong style="color:red;">(*)</strong></label>
                                                <input type="text" class="form-control" name="monto_pago"
                                                    placeholder="ingrese el valor del monto a pagar"
                                                    value="{{ old('monto_pago') }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Fecha del pago</label>
                                                <input type="text" class="form-control" name="fecha_pago"
                                                    value="{{ old('fecha_pago', \Carbon\Carbon::now()->format('Y-m-d H:i:s')) }}"
                                                    readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Metodo de pago <strong style="color:red;">(*)</strong></label>
                                                <select class="form-control" name="metodo_pago">
                                                    <option disabled value="">Seleccione el metodo de pago</option>
                                                    <option value="Efectivo" {{ old('metodo_pago') == 'Efectivo' ? 'selected' : '' }}>
                                                        Efectivo</option>
                                                    <option value="Transferencia" {{ old('metodo_pago') == 'Transferencia' ? 'selected' : '' }}>Transferencia</option>
                                            </div>
                                        </div>
                                        <input type="hidden" name="registrado_por" value="{{ Auth::user()->id }}">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-2 col-xs-4">
                                            <button type="submit"
                                                class="btn btn-primary btn-block btn-flat">Registrar</button>
                                        </div>
                                        <div class="col-lg-2 col-xs-4">
                                            <a href="{{ route('clientes.index') }}"
                                                class="btn btn-danger btn-block btn-flat">Atrás</a>
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