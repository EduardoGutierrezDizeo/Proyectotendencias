@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header text-center">
        <div class="container-fluid">
            <h1 class="text-dark font-weight-bold">Pagos Realizados</h1>
        </div>
    </section>

    @include('layouts.partial.msg')

    <section class="content">
        <div class="container-fluid">

            <div class="row mb-3">
                <div class="col-12 text-start">
                    {{-- Botón salir al panel de control --}}
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary" title="Salir">
                        <i class="fas fa-arrow-left"></i> Salir
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card border-dark shadow-lg">
                        <div class="card-header d-flex justify-content-between align-items-center"
                             style="background-color: #000; color: #fff; font-size: 1.5rem; font-weight: 600;">
                            Listado de Pagos

                            <a href="{{ route('pagos.create') }}" class="btn btn-danger" title="Nuevo">
                                <i class="fas fa-plus nav-icon"></i>
                            </a>
                        </div>

                        <div class="card-body bg-white">
                            <table id="example1" class="table table-bordered text-center table-striped">
                                <thead style="background-color: #f5d76e; color: #000;">
                                    <tr>
                                        <th>ID</th>
                                        <th>ID Factura Venta</th>
                                        <th>Monto Pagado</th>
                                        <th>Fecha de Pago</th>
                                        <th>Método de Pago</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pagos as $pago)
                                    <tr>
                                        <td>{{ $pago->id }}</td>
                                        <td>{{ $pago->factura_id }}</td>
                                        <td>${{ number_format($pago->monto_pago, 2) }}</td>
                                        <td>{{ $pago->fecha_pago }}</td>
                                        <td>{{ $pago->metodo_pago }}</td>
                                        <td>
                                            <form class="delete-form" action="{{ route('pagos.destroy', $pago) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" title="Eliminar">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            {{-- Paginación opcional --}}
                            {{-- {{ $pagos->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</di
