@extends('layouts.app')

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
                    <div class="col-12">
                        <div class="card border-warning shadow-lg">
                            <div class="card-header d-flex justify-content-between align-items-center"
                                style="background-color: #000; color: #e61919; font-size: 1.75rem; font-weight: 600;">
                                @yield('title')

                                <a href="{{route('carteraProveedores.create')}}" class="btn btn-danger" title="Nuevo">
                                    <i class="fas fa-plus nav-icon"></i>
                                </a>
                            </div>
                            <div class="card-body bg-light">
                                <table id="example1" class="table table-bordered text-center"
                                    style="border-collapse: collapse; border: 1px solid #ccc;">
                                    <thead style="background-color: #f5d76e; color: #8b0000;">
                                        <tr>
                                            <th style="border: 1px solid #ccc;">ID</th>
                                            <th style="border: 1px solid #ccc;">ID de proveedor</th>
                                            <th style="border: 1px solid #ccc;">ID de factura de compra</th>
                                            <th style="border: 1px solid #ccc;">Saldo pendiente</th>
                                            <th style="border: 1px solid #ccc;">Estado</th>
                                            <th style="border: 1px solid #ccc;">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($cartera_proveedores as $cartera_proveedor)
                                            <tr>
                                                <td style="border: 1px solid #ccc;">{{ $cartera_proveedor->id }}</td>
                                                <td style="border: 1px solid #ccc;">{{ $cartera_proveedor->proveedor_id }}</td>
                                                <td style="border: 1px solid #ccc;">{{ $cartera_proveedor->compra_id }}</td>
                                                <td style="border: 1px solid #ccc;">{{ $cartera_proveedor->saldo_pendiente }}
                                                </td>
                                                <td style="border: 1px solid #ccc;">

                                                    <input data-type="carteraProveedor" data-id="{{$cartera_proveedor->id}}"
                                                        class="toggle-class" type="checkbox" data-onstyle="success"
                                                        data-offstyle="danger" data-toggle="toggle" data-on="Activo"
                                                        data-off="Inactivo" {{ $cartera_proveedor->estado ? 'checked' : '' }}>
                                                </td>

                                                <td style="border: 1px solid #ccc;"> <!-- Cierre faltante estaba aquí -->
                                                    <form class="d-inline delete-form"
                                                        action="{{ route('carteraProveedores.destroy', $cartera_proveedor) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" title="Eliminar"><i
                                                                class="fas fa-trash-alt"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                {{-- Paginación opcional --}}
                                {{-- {{ $productos->links() }} --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection