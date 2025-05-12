@extends('layouts.app')

@section('title','Crear Proveedor')

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
						<form method="POST" action="{{ route('proveedores.store') }}">
							@csrf
							<div class="card-body">
								<div class="row">
									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label">Nombre <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="nombre" placeholder="Por ejemplo, Proveedor X" autocomplete="off" value="{{ old('nombre') }}">
										</div>
									</div>
								</div>
                                <div class="row">
									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label">Descripción <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="descripcion" placeholder="Por ejemplo, Proveedor de tecnología" autocomplete="off" value="{{ old('descripcion') }}">
										</div>
									</div>
								</div>
                                <div class="row">
									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label">Teléfono <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="telefono" placeholder="Por ejemplo, 123-456-7890" autocomplete="off" value="{{ old('telefono') }}">
										</div>
									</div>
								</div>
                                <div class="row">
									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label">Dirección <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="direccion" placeholder="Por ejemplo, Calle 123, Ciudad" autocomplete="off" value="{{ old('direccion') }}">
										</div>
									</div>
								</div>
                                <div class="row">
									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label">Email <strong style="color:red;">(*)</strong></label>
											<input type="email" class="form-control" name="email" placeholder="Por ejemplo, proveedor@correo.com" autocomplete="off" value="{{ old('email') }}">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label">Estado <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="estado" placeholder="Activo/Inactivo" autocomplete="off" value="{{ old('estado') }}">
										</div>
									</div>
								</div>
							</div>
							<div class="card-footer">
								<div class="row">
									<div class="col-lg-2 col-xs-4">
										<button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>
									</div>
									<div class="col-lg-2 col-xs-4">
										<a href="{{ route('proveedores.index') }}" class="btn btn-danger btn-block btn-flat">Atrás</a>
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
