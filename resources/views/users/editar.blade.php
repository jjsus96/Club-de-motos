@extends('layouts.app')
@section('title')
    Socios | {{ env('APP_NAME') }}
@endsection
@section('content')
    <section>
        <div class="contenedor-administracion">
            <a class="enlace-administracion" href="{{ route('users.index') }}">Ver listado de usuarios</a>
            <div class="formulario-administracion">
                {!! Form::model($user, ['route' => ['users.update', $user], 'method' => 'PUT', 'files' => true]) !!}
                <h1 class="titulo-formulario"> Editar Usuario </h1>
                <label>Nombre:</label>
                {!! Form::text('name', null, ['placeholder' => 'Nombre']) !!}
                <label>Email:</label>
                {!! Form::email('email', null, ['placeholder' => 'Correo electrónico']) !!}
                <label>Contraseña:</label>
                {!! Form::password('password', null, ['placeholder' => 'Contraseña']) !!}
                <label>Rol:</label>
                {!! Form::select('role_id', $roles, null, ['placeholder' => __('Seleccionar un valor')]) !!}
                <label>Avatar:</label>
                {!! Form::file('avatar', ['id' => 'avatar']) !!}
                <input class="btn-form-administracion" type="submit" value="Guardar">
                {!! Form::close() !!}
            </div>
        </div>
    </section>
@endsection
