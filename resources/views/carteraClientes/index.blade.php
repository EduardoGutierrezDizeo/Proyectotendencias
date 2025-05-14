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

                                <a href="{{route('carteraClientes.create')}}" class="btn btn-danger" title="Nuevo">
                                    <i class="fas fa-plus nav-icon"></i>
                                </a>
                            </div>
                            <div class="card-body bg-light">
                                <table id="example1" class="table table-bordered text-center"
                                    style="border-collapse: collapse; border: 1px solid #ccc;">
                                    <thead style="background-color: #f5d76e; color: #8b0000;">
                                        <tr>
                                            <th style="border: 1px solid #ccc;">ID</th>
                                            <th style="border: 1px solid #ccc;">ID de cliente</th>
                                            <th style="border: 1px solid #ccc;">ID de factura de venta</th>
                                            <th style="border: 1px solid #ccc;">Saldo pendiente</th>
                                            <th style="border: 1px solid #ccc;">Fecha Limite</th>
                                            <th style="border: 1px solid #ccc;">Estado</th>
                                            <th style="border: 1px solid #ccc;">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($cartera_clientes as $cartera_cliente)
                                            <tr>
                                                <td style="border: 1px solid #ccc;">{{ $cartera_cliente->id }}</td>
                                                <td style="border: 1px solid #ccc;">{{ $cartera_cliente->cliente_id }}</td>
                                                <td style="border: 1px solid #ccc;">{{ $cartera_cliente->factura_id }}</td>
                                                <td style="border: 1px solid #ccc;">{{ $cartera_cliente->saldo_pendiente }}</td>
                                                <td style="border: 1px solid #ccc;">{{ $cartera_cliente->fecha_limite }}</td>
                                                <td style="border: 1px solid #ccc;">

                                                    <input data-type="carteraCliente" data-id="{{$cartera_cliente->id}}"
                                                        class="toggle-class" type="checkbox" data-onstyle="success"
                                                        data-offstyle="danger" data-toggle="toggle" data-on="Activo"
                                                        data-off="Inactivo" {{ $cartera_cliente->estado ? 'checked' : '' }}>
                                                </td>

                                                <td style="border: 1px solid #ccc;"> <!-- Cierre faltante estaba aquí -->
                                                    <form class="d-inline delete-form"
                                                        action="{{ route('carteraClientes.destroy', $cartera_cliente) }}"
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