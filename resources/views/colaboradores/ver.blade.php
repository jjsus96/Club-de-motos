@extends('layouts.app')
@section('title')
    Colaboradores | {{ env('APP_NAME') }}
@endsection
@section('content')
    <section>
        <div class="contenedor-tablas">
            <h1 class="titulo-inicio">Colaboradores</h1>
            <a href="{{ route('colaboradores.index') }}">Ver listado de Colaboradores</a>
            <div class="ficha-administracion">
                <div>
                    <p> Nombre Colaborador: {{ $colaborador->nombre_colaborador }}</p>
                    <p> Teléfono Colaborador: {{ $colaborador->telefono_colaborador }}</p>
                    <p> Email Colaborador: {{ $colaborador->email_colaborador }}</p>
                </div>
            </div>
        </div>
    </section>
@endsection
