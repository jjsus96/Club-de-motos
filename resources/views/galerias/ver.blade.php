@extends('layouts.app')
@section('title')
    Galerías | {{ env('APP_NAME') }}
@endsection
@section('content')
    <section>
        <div class="contenedor-tablas">
            <h1 class="titulo-inicio">Galerías</h1>
            <a href="/galerias">Ver listado de Galerías</a>
            <div class="ficha-administracion">
                <div>
                    <p> Imagen: {{ $galeria->imagen }}</p>
                    <p> Evento: {{ $galeria->evento_id }}</p>
                </div>
            </div>
        </div>
    </section>
@endsection
