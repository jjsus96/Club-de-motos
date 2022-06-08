@extends('layouts.app')
@section('title')
    Galerías | {{ env('APP_NAME') }}
@endsection
@section('content')
    <section>
        <div class="contenedor-tablas">
            <h1 class="titulo-inicio">Galerías</h1>
            <a href="{{ route('galerias.index') }}">Ver listado de Galerías</a>
            <div class="ficha-administracion">
                <div>
                    <div>
                        @if ($galeria->imagen)
                            <img class="imagen-ver" src="{{ asset('img/galerias/'.$galeria->imagen) }}" alt="{{ $galeria->imagen }}">
                        @else
                            Sin imagen
                        @endif
                    </div>
                    <p> Evento: {{ $galeria->evento_id }}</p>
                </div>
            </div>
        </div>
    </section>
@endsection
