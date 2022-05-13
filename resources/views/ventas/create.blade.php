@extends('layout')

@section('content')
    <div class="form">
        <div class="title">Realizar venta</div>
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

        @if(isset($warnings))
            <div class="alert alert-danger">
                <p><strong>Lo sentimos: </strong></p>
                <ul>
                    @foreach ($warnings as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('ventas.store') }}" method="POST">
			@csrf
			@method('POST')

            <div class="content-fields">
                <div class="input-container ic2">
                    <label class="placeholder">Cantidad</label>
                    <input class="input" type="number" name="cantidad" placeholder=" " required />
                </div>
                <div class="input-container ic2">
                    <label class="placeholder">Categoría</label>
                    <select class="input" name="producto_id" required>
                        @foreach ($productos as $producto)
                            <option value="{{ $producto->id }}" @selected(old('producto_id') == $producto->id)>
                                {{ $producto->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" class="submit" @disabled($errors->isNotEmpty())>Realizar venta</button>
            <a href="{{ url('/productos') }}" class="submit btnCancel">Atrás</a>
        </form>
    </div>
@endsection

<link href="{{ asset('/css/form_ventas.css') }}" rel="stylesheet">