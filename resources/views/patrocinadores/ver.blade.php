@extends('layouts.app')
@section('title')
    Patrocinadores | {{ env('APP_NAME') }}
@endsection
@section('content')
    <section>
        <div class="contenedor-tablas">
            <h1 class="titulo-inicio">Patrocinadores</h1>
            <a href="/patrocinadores">Ver listado de Patrocinadores</a>
            <div class="ficha-administracion">
                <div>
                    <p> Nombre Patrocinador: {{ $patrocinador->nombre_patrocinador }}</p>
                    <p> Teléfono Patrocinador: {{ $patrocinador->telefono_patrocinador }}</p>
                    <p> Email Patrocinador: {{ $patrocinador->email_patrocinador }}</p>
                </div>
            </div>
        </div>
    </section>
@endsection
