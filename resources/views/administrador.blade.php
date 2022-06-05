@extends('layouts.app')

@section('content')
    <section>
        <h1 class="titulo-inicio">Administración</h1>
        <div class="contenedor-admin">
            <a href="/users"><button class="btn-form">Usuarios</button></a>
            <a href="/socios"><button class="btn-form">Socios</button></a>
            <a href="/eventos"><button class="btn-form">Eventos</button></a>
            <a href="/patrocinadores"><button class="btn-form">Patrocinadores</button></a>
            <a href="/galerias"><button class="btn-form">Galería</button></a>
            <a href="/colaboradores"><button class="btn-form"> Colaboradores</button></a>
        </div>
</section>
@endsection
