@extends('layouts.app')
@section('title')
    Eventos | {{ env('APP_NAME') }}
@endsection
@section('content')
    <section>
        <div class="contenedor-tablas">
            <h1 class="titulo-inicio">Eventos</h1>
            <a href="/eventos">Ver listado de Eventos</a>
            <div class="ficha-administracion">
                <div>
                    <p>Nombre:{{ $evento->nombre_evento }}</p>
                    <p>Cartel: {{ $evento->cartel }}</p>
                    <p>Fecha Inicio: {{ $evento->fecha_inicio }}</p>
                    <p>Descripción: {{ $evento->descripcion }}</p>
                    <p>Colaborador: {{ $evento->colaborador_id }}</p>
                    <p>Patrocinador: {{ $evento->patrocinador_id }}</p>
                </div>
            </div>
        </div>
    </section>
@endsection
