@extends('layouts.app')
@section('title')
    Usuarios | {{ env('APP_NAME') }}
@endsection
@section('content')
    <section>
            <div class="contenedor-tablas">
                <h1 class="titulo-inicio">Usuarios</h1>
                <a href="{{ route('users.index') }}">Ver listado de usuarios</a>
                <div class="ficha-administracion">
                    <div>
                        <div>
                            @if ($user->avatar)
                                <img class="imagen-ver" src="{{ asset('img/users/'.$user->avatar) }}" alt="{{ $user->name }}">
                            @else
                                Sin imagen
                            @endif
                        </div>
                        <p> Usuario: {{ $user->name }}</p>
                        <p> Email: {{ $user->email }}</p>
                        <p> Contraseña: {{ $user->password }}</p>
                        <p> Rol: {{ $user->role_id }}</p>
                    </div>
                </div>
            </div>
    </section>
@endsection


