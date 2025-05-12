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

                            <a href="{{route('productos.create')}}" class="btn btn-danger" title="Nuevo">
                                <i class="fas fa-plus nav-icon"></i>
                            </a>
                        </div>
                        <div class="card-body bg-light">
                            <table id="example1" class="table table-bordered text-center"
                                   style="border-collapse: collapse; border: 1px solid #ccc;">
                                <thead style="background-color: #f5d76e; color: #8b0000;">
                                    <tr>
                                        <th style="border: 1px solid #ccc;">ID</th>
                                        <th style="border: 1px solid #ccc;">Nombre</th>
                                        <th style="border: 1px solid #ccc;">Descripción</th>
                                        <th style="border: 1px solid #ccc;">Categoria</th>
                                        <th style="border: 1px solid #ccc;">Precio de Venta</th>
                                        <th style="border: 1px solid #ccc;">Stock Actual</th>
                                        <th style="border: 1px solid #ccc;">Stock Mínimo</th>
                                        <th style="border: 1px solid #ccc;">Estado</th>
                                        <th style="border: 1px solid #ccc;">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($productos as $producto)
                                    <tr>
                                        <td style="border: 1px solid #ccc;">{{ $producto->id }}</td>
                                        <td style="border: 1px solid #ccc;">{{ $producto->nombre }}</td>
                                        <td style="border: 1px solid #ccc;">{{ $producto->descripcion }}</td>
                                        <td style="border: 1px solid #ccc;">{{ $producto->categoria }}</td>
                                        <td style="border: 1px solid #ccc;">{{ number_format($producto->precio_venta, 2) }}</td>
                                        <td style="border: 1px solid #ccc;">{{ $producto->stock }}</td>
                                        <td style="border: 1px solid #ccc;">{{ $producto->stock_minimo }}</td>
                                        <td style="border: 1px solid #ccc;">

                                        <input data-type="producto" data-id="{{$producto->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" 
                                        data-toggle="toggle" data-on="Activo" data-off="Inactivo" {{ $producto->estado ? 'checked' : '' }}>
                                        <td>
                                        <form class="d-inline delete-form" action="{{ route('productos.destroy', $producto) }}"  method="POST">
												@csrf
												@method('DELETE')
												<button type="submit" class="btn btn-danger btn-sm" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
                                        </td>
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
