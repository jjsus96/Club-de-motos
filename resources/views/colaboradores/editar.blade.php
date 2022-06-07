@extends('layouts.app')
@section('title')
    Colaboradores | {{ env('APP_NAME') }}
@endsection
@section('content')
    <section>
        <div class="contenedor-administracion">
            <a class="enlace-administracion" href="{{ route('colaboradores.index') }}">Ver listado de colaboradores</a>
            <div class="formulario-administracion">
                {!! Form::model($colaborador, ['route' => ['colaboradores.update', $colaborador], 'method' => 'PUT']) !!}
                <h1 class="titulo-formulario"> Editar Colaborador</h1>
                <label>Nombre:</label>
                {!! Form::text('nombre_colaborador', null, ['placeholder' => 'Nombre']) !!}
                <label>Teléfono:</label>
                {!! Form::tel('telefono_colaborador', null, ['placeholder' => 'Teléfono']) !!}
                <label>Email:</label>
                {!! Form::email('email_colaborador', null, ['placeholder' => 'Correo electrónico']) !!}
                <input class="btn-form-administracion" type="submit" value="Guardar">
                {!! Form::close() !!}
            </div>
        </div>
    </section>
@endsection
