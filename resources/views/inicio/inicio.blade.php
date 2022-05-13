@extends('layout')

@section('content')
    <div class="content">
        <header class="content-header">
            Prueba Konecta
        </header>
        <div class="content-body">
            <div class="information">
                <h1>Información</h1>
                <h2>Jesus Alberto Garcia Mancipe - Desarrollador Full Stack</h2>
                <p>Jes.alberto96@gmail.com - 3132507633</p>
            </div>
            <div class="buttons">
                <a class="button btnProductos" href="{{ route('productos.index') }}">Gestionar productos</a>
                <a class="button btnVentas" href="{{ route('ventas.create') }}">Comprar productos</a>
            </div>
        </div>
    </div>
@endsection

<link href="{{ asset('/css/inicio.css') }}" rel="stylesheet">