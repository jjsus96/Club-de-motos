@extends('layouts.app')
@section('title')
    Socios | {{ env('APP_NAME') }}
@endsection
@section('content')
    <section>
        <div class="contenedor-tablas">
            <h1 class="titulo-inicio">Socios</h1>
            <a href="{{ route('socios.index') }}">Ver listado de Socios</a>
            <div class="ficha-administracion">
                <div>
                    <p> Usuario: {{ $socio->usuario_id }}</p>
                    <p> Nombre: {{ $socio->nombre_socio }}</p>
                    <p> Apellidos: {{ $socio->apellidos }}</p>
                    <p> Fecha de nacimiento: {{ $socio->fecha_nacimiento }}</p>
                    <p> Teléfono: {{ $socio->telefono }}</p>
                    <p> Dirección: {{ $socio->direccion }}</p>
                    <p> Padrino: {{ $socio->padrino }}</p>
                    <p> Motocicleta: {{ $socio->motocicleta }}</p>
                    <p> Foto de Carnet: {{ $socio->foto_carnet }}</p>
                </div>
            </div>
        </div>
    </section>
@endsection
