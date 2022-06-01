@extends('layouts.app')
@section('title')
    Eventos | {{ env('APP_NAME') }}
@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection
@section('content')
    <section>
        <div class="contenedor-administracion">

            <a class="enlace-administracion" href="{{ route('eventos.index') }}">Ver listado de Eventos</a>

            <div class="formulario-administracion">
                {!! Form::model($evento, ['route' => ['eventos.update', $evento], 'method' => 'PUT', 'files' => true]) !!}
                <h1 class="titulo-formulario"> Editar Evento </h1>
                <label>Nombre:</label>
                {!! Form::text('nombre_evento', null, ['placeholder' => 'Nombre']) !!}
                <label>Cartel:</label>
                {!! Form::file('cartel', ['id' => 'cartel']) !!}
                <label>Fecha de inicio:</label>
                {!! Form::date('fecha_inicio', null, ['placeholder' => 'Fecha de inicio']) !!}
                <label>Descripción:</label>
                {!! Form::text('descripcion', null, ['placeholder' => 'Descripción']) !!}
                <label>Colaborador:</label>
                {!! Form::select('colaborador_id', $colaboradores, null, ['placeholder' => 'Seleccionar un colaborador']) !!}
                <label>Patrocinador:</label>
                {!! Form::select('patrocinador_id', $patrocinadores, null, ['placeholder' => 'Seleccionar un patrocinador']) !!}
                <input class="btn-form-administracion" type="submit" value="Guardar">
                {!! Form::close() !!}
            </div>
        </div>
    </section>
@endsection
