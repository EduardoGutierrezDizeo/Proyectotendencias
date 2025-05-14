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

                                <a href="{{route('pagos.create')}}" class="btn btn-danger" title="Nuevo">
                                    <i class="fas fa-plus nav-icon"></i>
                                </a>
                            </div>
                            <div class="card-body bg-light">
                                <table id="example1" class="table table-bordered text-center"
                                    style="border-collapse: collapse; border: 1px solid #ccc;">
                                    <thead style="background-color: #f5d76e; color: #8b0000;">
                                        <tr>
                                            <th style="border: 1px solid #ccc;">ID</th>
                                            <th style="border: 1px solid #ccc;">ID de factura de venta</th>
                                            <th style="border: 1px solid #ccc;">Monto pagado</th>
                                            <th style="border: 1px solid #ccc;">Fecha de pago</th>
                                            <th style="border: 1px solid #ccc;">Metodo de pago</th>
                                            <th style="border: 1px solid #ccc;">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pagos as $pago)
                                            <tr>
                                                <td style="border: 1px solid #ccc;">{{ $pago->id }}</td>
                                                <td style="border: 1px solid #ccc;">{{ $pago->factura_id }}</td>
                                                <td style="border: 1px solid #ccc;">{{ $pago->monto_pago }}</td>
                                                <td style="border: 1px solid #ccc;">{{ $pago->fecha_pago }}</td>
                                                <td style="border: 1px solid #ccc;">{{ $pago->metodo_pago }}</td>

                                                <td style="border: 1px solid #ccc;"> <!-- Cierre faltante estaba aquí -->
                                                    <form class="d-inline delete-form"
                                                        action="{{ route('pagos.destroy', $pago) }}"
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