@extends('layouts.app')

@section('title','Crear Producto')

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
						<form method="POST" action="{{ route('productos.store') }}">
							@csrf
							<div class="card-body">
								<div class="row">
									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label">Nombre <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="nombre" placeholder="Por ejemplo, Visibilidad" autocomplete="off" value="{{ old('nombre') }}">
										</div>
									</div>
								</div>
                                <div class="row">
									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label">Descripcion <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="descripcion" placeholder="Por ejemplo, Visibilidad" autocomplete="off" value="{{ old('descripcion') }}">
										</div>
									</div>
								</div>
                                <div class="row">
									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label">precio compra <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="precio_compra" placeholder="Por ejemplo, Visibilidad" autocomplete="off" value="{{ old('precio_compra') }}">
										</div>
									</div>
                                    <div class="row">
									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label">precio venta <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="precio_venta" placeholder="Por ejemplo, Visibilidad" autocomplete="off" value="{{ old('precio_venta') }}">
										</div>
									</div>
                                    <div class="row">
									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label">stock<strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="stock" placeholder="Por ejemplo, Visibilidad" autocomplete="off" value="{{ old('stock') }}">
										</div>
									</div>
                                    <div class="row">
									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label">categoria<strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="categoria" placeholder="Por ejemplo, Visibilidad" autocomplete="off" value="{{ old('categoria') }}">
										</div>
									</div>
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label">proveedor_id<strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="proveedor_id" placeholder="Por ejemplo, Visibilidad" autocomplete="off" value="{{ old('proveedor_id') }}">
										</div>
									</div>
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label">estado<strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="estado" placeholder="Por ejemplo, Visibilidad" autocomplete="off" value="{{ old('estado') }}">
										</div>
									</div>
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label">registrado_por<strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="registrado_por" placeholder="Por ejemplo, Visibilidad" autocomplete="off" value="{{ old('registrado_por') }}">
										</div>
									</div>
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label">stock_minimo<strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="stock_minimo" placeholder="Por ejemplo, Visibilidad" autocomplete="off" value="{{ old('stock_minimo') }}">
										</div>
									</div>
								</div>
								<input type="hidden" class="form-control" name="estado" value="1">
								<input type="hidden" class="form-control" name="registrado_por" value="{{ Auth::user()->id }}">
							</div>
							<div class="card-footer">
								<div class="row">
									<div class="col-lg-2 col-xs-4">
										<button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>
									</div>
									<div class="col-lg-2 col-xs-4">
										<a href="{{ route('productos.index') }}" class="btn btn-danger btn-block btn-flat">Atras</a>
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