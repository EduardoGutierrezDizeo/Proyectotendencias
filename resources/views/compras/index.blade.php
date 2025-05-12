@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h1 class="m-0" style="color:  #1d1d1d;">Compras Realizadas</h1>
        </div>
    </section>

    @include('layouts.partial.msg')
    
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow-lg" style="background-color: #1d1d1d; color: #f1f1f1;">
                        <div class="card-header d-flex justify-content-between align-items-center"
                             style="background-color: #9b59b6; color: white;">
                            <h3 class="card-title" style="font-size: 1.75rem; font-weight: 600;">Lista de Compras</h3>
                            <a href="{{ route('compras.create') }}" class="btn btn-light" title="Nueva Compra">
                                <i class="fas fa-plus nav-icon" style="color: #9b59b6;"></i> Nueva Compra
                            </a>
                        </div>

                        <div class="card-body bg-dark">
                            <table id="example1" class="table table-bordered text-center"
                                   style="border-collapse: collapse; border: 1px solid #ccc; color: white;">
                                <thead style="background-color: #9b59b6; color: white;">
                                    <tr>
                                        <th style="border: 1px solid #ccc;">ID</th>
                                        <th style="border: 1px solid #ccc;">Proveedor</th>
                                        <th style="border: 1px solid #ccc;">Fecha de Compra</th>
                                        <th style="border: 1px solid #ccc;">Total Compra</th>
                                        <th style="border: 1px solid #ccc;">Estado de Pago</th>
                                        <th style="border: 1px solid #ccc;">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody style="background-color: #2c2c2c;">
                                    @foreach($compras as $compra)
                                    <tr>
                                        <td style="border: 1px solid #ccc;">{{ $compra->id }}</td>
                                        <td style="border: 1px solid #ccc;">{{ $compra->proveedor->nombre }}</td>
                                        <td style="border: 1px solid #ccc;">{{ $compra->fecha_compra }}</td>
                                        <td style="border: 1px solid #ccc;">{{ number_format($compra->total_compra, 2) }}</td>
                                        <td style="border: 1px solid #ccc;">
                                            <span class="badge {{ $compra->estado_pago == 'pendiente' ? 'bg-warning' : ($compra->estado_pago == 'pagado' ? 'bg-success' : 'bg-danger') }}">
                                                {{ ucfirst($compra->estado_pago) }}
                                            </span>
                                        </td>
                                        <td style="border: 1px solid #ccc;">
                                            <a href="{{ route('compras.edit', $compra->id) }}" class="btn btn-info btn-sm" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('compras.destroy', $compra->id) }}" method="POST" class="d-inline">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
