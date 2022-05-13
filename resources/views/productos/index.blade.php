
@extends('layout')

@section('content')
    <div class="container">
		<div>
			<a href="/" class="button btnEditar">Inicio</a>
			<a href="{{ route('productos.create') }}" class="button btnCrear">Nueva factura</a>
		</div>
		<div class="container-facturas">
			<div class="table">
				<div class="table-header">
					<div class="header__item"><a id="name" class="filter__link" href="#">#</a></div>
					<div class="header__item"><a id="draws" class="filter__link filter__link--number" href="#">Nombre</a></div>
					<div class="header__item"><a id="losses" class="filter__link filter__link--number" href="#">Referencía</a></div>
					<div class="header__item"><a id="total" class="filter__link filter__link--number" href="#">Precio</a></div>
					<div class="header__item"><a id="total" class="filter__link filter__link--number" href="#">Acciones</a></div>
				</div>

				<div class="table-content">
                    @foreach ($productos as $producto)
                        <div class="table-row">
                            <div class="table-data">{{ $producto->id }}</div>
                            <div class="table-data">{{ $producto->nombre }}</div>
                            <div class="table-data">{{ $producto->referencia }}</div>
                            <div class="table-data">{{ $producto->precio }}</div>
                            <div class="table-data">
                                <a href="{{ route('productos.edit', $producto) }}" class="button btnEditar">Editar</a>
								<form action="{{ route('productos.destroy', $producto) }}" method="POST">
									@csrf
									@method('DELETE')
									<button type="submit" class="button btnEliminar">Eliminar</button>
								</form>
                            </div>
                        </div>
                    @endforeach
				</div>
			</div>
		</div>
	</div>
@endsection

<link href="{{ asset('/css/list_products.css') }}" rel="stylesheet">
<script src="{{ asset('/js/list_products.js') }}" type="text/javascript"></script>
