@extends('layouts.app')

@section('content')
    <section>
        <h1 class="titulo-inicio">Administración</h1>
        <div class="contenedor-admin">
            <a href="{{ route('users.index') }}"><button class="btn-form">Usuarios</button></a>
            <a href="{{ route('socios.index') }}"><button class="btn-form">Socios</button></a>
            <a href="{{ route('eventos.index') }}"><button class="btn-form">Eventos</button></a>
            <a href="{{ route('patrocinadores.index') }}"><button class="btn-form">Patrocinadores</button></a>
            <a href="{{ route('galerias.index') }}"><button class="btn-form">Galería</button></a>
            <a href="{{ route('colaboradores.index') }}"><button class="btn-form"> Colaboradores</button></a>
        </div>
</section>
@endsection
