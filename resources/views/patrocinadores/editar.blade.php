@extends('layouts.app')
@section('title')
    Patrocinadores | {{ env('APP_NAME') }}
@endsection
@section('content')
    <section>
        <div class="contenedor-administracion">

            <a class="enlace-administracion" href="/patrocinadores">Ver listado de patrocinadores</a>

                <div class="formulario-administracion">
            {!! Form::model($patrocinador, ['route'=>['patrocinadores.update',$patrocinador], 'method'=>'PUT']) !!}
            <h1 class="titulo-formulario"> Editar Patrocinio </h1>
            <label>Nombre:</label>
                {!! Form::text('nombre_patrocinador', null, ['placeholder' => 'Nombre']) !!}
                <label>Teléfono:</label>
                {!! Form::tel('telefono_patrocinador', null, ['placeholder' => 'Teléfono']) !!}
                <label>Email:</label>
                {!! Form::email('email_patrocinador', null, ['placeholder' => 'Correo electrónico']) !!}
                <input class="btn-form-administracion" type="submit" value="Guardar">
            {!! Form::close() !!}
        </div>
    </div>
</section>
@endsection
