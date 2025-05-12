@extends('layouts.app')

@section('title', 'Listado de Facturas')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid"></div>
    </section>

    @include('layouts.partial.msg')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card border-primary shadow-lg">
                        <div class="card-header d-flex justify-content-between align-items-center"
                             style="background-color: #7f8c8d; color: #fff; font-size: 1.75rem; font-weight: 600;">
                            @yield('title')
                            <a href="{{ route('facturas.create') }}" class="btn btn-success" title="Nueva Factura">
                                <i class="fas fa-plus nav-icon"></i>
                            </a>
                        </div>
                        <div class="card-body bg-light">
                            <table id="example1" class="table table-bordered text-center table-striped"
                                   style="border-collapse: collapse; border: 1px solid #ccc;">
                                <thead style="background-color: #9b59b6; color: white;">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre Cliente</th>
                                        <th>NIT Cliente</th>
                                        <th>Fecha Venta</th>
                                        <th>Total Factura</th>
                                        <th>Vendedor</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($facturas as $factura)
                                    <tr>
                                        <td>{{ $factura->id }}</td>
                                        <td>{{ $factura->nombre_cliente }}</td>
                                        <td>{{ $factura->nit_cliente }}</td>
                                        <td>{{ $factura->fecha_venta }}</td>
                                        <td>{{ number_format($factura->total_factura, 2) }} $</td>
                                        <td>{{ $factura->vendedor->nombre }}</td>
                                        <td>
                                            <input data-type="factura" data-id="{{ $factura->id }}" class="toggle-class"
                                                type="checkbox" data-onstyle="success" data-offstyle="danger"
                                                data-toggle="toggle" data-on="Pagado" data-off="Pendiente"
                                                {{ $factura->estado == 'Pagado' ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <a href="{{ route('facturas.edit', $factura) }}" class="btn btn-warning btn-sm" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form class="d-inline delete-form" action="{{ route('facturas.destroy', $factura) }}" method="POST">
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
                            {{-- {{ $facturas->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
