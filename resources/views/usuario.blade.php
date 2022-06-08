@extends('layouts.app')
@section('content')
<script src="{{ asset('js/components/Validacionesusuario.js') }}"></script>
<section>
    <div class="contenedor-administracion">
        <div class="formulario-administracion">
            {!! Form::model($user, ['route' => ['usuario.actualizar', $user], 'method' => 'PUT', 'files' => true]) !!}
            <h1 class="titulo-formulario"> Editar Usuario </h1>
            <label>Nombre:</label>
            {!! Form::text('name', $user->name, ['placeholder' => 'Nombre', 'onfocusout'=>'validarnombrecompleto()' ]) !!}
            <p id="errornombre"></p>
            <label>Email:</label>
            {!! Form::email('email', $user->email, ['placeholder' => 'Correo electrónico']) !!}
            <p id="erroremail"></p>
            <label>Contraseña:</label>
            {!! Form::password('password', null, ['placeholder' => 'Contraseña']) !!}
            <p id="errorpassword"></p>
            <label>Avatar:</label>
            {!! Form::file('avatar', ['id' => 'avatar']) !!}
            <input class="btn-form-administracion" type="submit" value="Guardar">
            {!! Form::close() !!}
        </div>
    </div>
</section>
@endsection
