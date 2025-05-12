@extends('layouts.app')

@section('title', 'Listado de Clientes')

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
                    <div class="card border-warning shadow-lg">
                        <div class="card-header d-flex justify-content-between align-items-center"
                             style="background-color: #000; color: #e61919; font-size: 1.75rem; font-weight: 600;">
                            Listado de Clientes
                            <a href="{{route('clientes.create')}}" class="btn btn-danger" title="Nuevo Cliente">
                                <i class="fas fa-plus nav-icon"></i>
                            </a>
                        </div>
                        <div class="card-body bg-light">
                            <table id="example1" class="table table-bordered text-center"
                                   style="border-collapse: collapse; border: 1px solid #ccc;">
                                <thead style="background-color: #f5d76e; color: #8b0000;">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Teléfono</th>
                                        <th>Dirección</th>
                                        <th>Correo Electrónico</th>
                                        <th>Negocio</th>
                                        <th>Crédito Disponible</th>
                                        <th>Deuda Actual</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($clientes as $cliente)
                                    <tr>
                                        <td>{{ $cliente->id }}</td>
                                        <td>{{ $cliente->nombre }}</td>
                                        <td>{{ $cliente->telefono }}</td>
                                        <td>{{ $cliente->direccion }}</td>
                                        <td>{{ $cliente->correo_electronico }}</td>
                                        <td>{{ $cliente->nombre_negocio }}</td>
                                        <td>{{ number_format($cliente->credito_disponible, 2) }}</td>
                                        <td>{{ number_format($cliente->deuda_actual, 2) }}</td>
                                        <td>
                                            <input data-type="cliente" data-id="{{$cliente->id}}" class="toggle-class" type="checkbox"
                                                data-onstyle="success" data-offstyle="danger" 
                                                data-toggle="toggle" data-on="Activo" data-off="Inactivo" {{ $cliente->estado === 'Activo' ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <form class="d-inline delete-form" action="{{ route('clientes.destroy', $cliente) }}" method="POST">
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
                            {{-- {{ $clientes->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
