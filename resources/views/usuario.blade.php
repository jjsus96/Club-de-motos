@extends('layouts.app')
@section('content')
<section>
    <div class="contenedor-administracion">
        <div class="formulario-administracion">
            {!! Form::model($user, ['route' => ['usuario.actualizar', $user], 'method' => 'PUT', 'files' => true]) !!}
            <h1 class="titulo-formulario"> Editar Usuario </h1>
            <label>Nombre:</label>
            {!! Form::text('name', $user->name, ['placeholder' => 'Nombre']) !!}
            <label>Email:</label>
            {!! Form::email('email', $user->email, ['placeholder' => 'Correo electrónico']) !!}
            <label>Contraseña:</label>
            {!! Form::password('password', null, ['placeholder' => 'Contraseña']) !!}
            <label>Avatar:</label>
            {!! Form::file('avatar', ['id' => 'avatar']) !!}
            <input class="btn-form-administracion" type="submit" value="Guardar">
            {!! Form::close() !!}
        </div>
    </div>
</section>
@endsection
