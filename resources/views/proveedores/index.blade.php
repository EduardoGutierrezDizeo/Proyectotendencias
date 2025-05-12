@extends('layouts.app')

@section('title','Listado de Proveedores')

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
                             style="background-color: #000; color: #f1c6e0; font-size: 1.75rem; font-weight: 600;">
                            @yield('title')

                            <a href="{{ route('proveedores.create') }}" class="btn btn-danger" title="Nuevo">
                                <i class="fas fa-plus nav-icon"></i>
                            </a>
                        </div>
                        <div class="card-body bg-light">
                            <table id="example1" class="table table-bordered text-center"
                                   style="border-collapse: collapse; border: 1px solid #ccc;">
                                <thead style="background-color: #f0b3d3; color: #5b0e2d;">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Teléfono</th>
                                        <th>Correo</th>
                                        <th>Dirección</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($proveedores as $proveedor)
                                    <tr style="background-color: #fff0f6;">
                                        <td>{{ $proveedor->id }}</td>
                                        <td>{{ $proveedor->nombre }}</td>
                                        <td>{{ $proveedor->telefono }}</td>
                                        <td>{{ $proveedor->correo_electronico }}</td>
                                        <td>{{ $proveedor->direccion }}</td>
                                        <td>
                                            <input data-type="proveedor" data-id="{{ $proveedor->id }}" class="toggle-class"
                                                type="checkbox" data-onstyle="success" data-offstyle="danger"
                                                data-toggle="toggle" data-on="Activo" data-off="Inactivo"
                                                {{ $proveedor->estado == '1' ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <a href="{{ route('proveedores.edit', $proveedor) }}" class="btn btn-warning btn-sm" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form class="d-inline delete-form" action="{{ route('proveedores.destroy', $proveedor) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" title="Eliminar">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr><td colspan="7" style="border-top: 1px solid #d8a8c3;"></td></tr> <!-- Línea horizontal -->
                                    @endforeach
                                </tbody>
                            </table>

                            {{-- Paginación opcional --}}
                            {{-- {{ $proveedores->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
