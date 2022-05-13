@extends('layout')

@section('content')
    <div class="form">
        <div class="title">Crear producto</div>
		@if($errors->any())
			<div class="alert alert-danger">
				<p><strong>Ocurrierón los siguientes errores: </strong></p>
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
        <form action="/productos" method="POST">
			@csrf
			@method('POST')

            <div class="input-container ic1">
                <label class="placeholder">Nombre</label>
                <input class="input" type="text" name="nombre" placeholder=" " required />
            </div>
            <div class="input-container ic2">
                <label class="placeholder">Referencia</label>
                <input class="input" type="text" name="referencia" placeholder=" " required />
            </div>
            <div class="input-container ic2">
                <label class="placeholder">Precio</label>
                <input class="input" type="number" name="precio" placeholder=" " required />
            </div>
            <div class="input-container ic2">
                <label class="placeholder">Peso</label>
                <input class="input" type="number" name="peso" placeholder=" " required />
            </div>
            <div class="input-container ic2">
                <label class="placeholder">Stock</label>
                <input class="input" type="number" name="stock" placeholder=" " required />
            </div>
            <div class="input-container ic2">
                <label class="placeholder">Categoría</label>
                <select class="input" name="categoria_id" required>
                    @foreach ($categorias as $categoria)
						<option value="{{ $categoria->id }}" @selected(old('categoria_id') == $categoria->id)>
							{{ $categoria->nombre }}
						</option>
					@endforeach
                </select>
            </div>
            <button type="submit" class="submit" @disabled($errors->isNotEmpty())>Guardar</button>
            <a href="{{ url('/productos') }}" class="submit btnCancel">Atrás</a>
        </form>
    </div>
@endsection

<link href="{{ asset('/css/form_products.css') }}" rel="stylesheet">
