@extends('layouts.app')
@section('title')
    Socios | {{ env('APP_NAME') }}
@endsection
@section('content')
<section>
    <div class="contenedor-administracion">
        <a class="enlace-administracion" href="{{ route('users.index') }}">Ver listado de usuarios</a>
        <div class="formulario-administracion">
            {!! Form::open(['route'=>['users.store'], 'method' => 'POST', 'files' => true]) !!}

                <h1 class="titulo-formulario"> Nuevo Usuario </h1>

                <label>Nombre:</label>
                {!! Form::text('name', null, ['placeholder' => 'Nombre']) !!}
                @error('name')
                    <div>{{ $message }}</div>
                @enderror

                <label>Email:</label>
                {!! Form::email('email', null, ['placeholder' => 'Correo electrónico']) !!}
                @error('email')
                    <div>{{ $message }}</div>
                @enderror

                <label>Contraseña:</label>
                {!! Form::password('password', null, ['placeholder' => 'Contraseña']) !!}
                @error('password')
                    <div>{{ $message }}</div>
                @enderror

                <label>Rol:</label>
                {!! Form::select('role_id', $roles, null, ['placeholder' => __('Seleccionar un valor')]) !!}
                @error('role_id')
                    <div>{{ $message }}</div>
                @enderror

                <label>Avatar:</label>
                {!! Form::file('avatar', ['id' => 'avatar']) !!}
                @error('avatar')
                    <div>{{ $message }}</div>
                @enderror

                <input class="btn-form-administracion" type="submit" value="Guardar">
            {!! Form::close() !!}
        </div>
    </div>
</section>
@endsection

