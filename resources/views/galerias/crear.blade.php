@extends('layouts.app')
@section('title')
    Galerías | {{ env('APP_NAME') }}
@endsection
@section('content')
    <section>
        <div class="contenedor-administracion">
            <a class="enlace-administracion" href="{{ route('galerias.index') }}">Ver listado de Galerías</a>
            <div class="formulario-administracion">
                {!! Form::open(['route' => ['galerias.store'], 'method' => 'POST', 'files' => true]) !!}
                <h1 class="titulo-formulario"> Nueva Galería </h1>
                <label>Evento:</label>
                {!! Form::select('evento_id', $eventos, null, ['placeholder' => 'Seleccionar un evento']) !!}
                @error('evento_id')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label>Imagen:</label>
                {!! Form::file('imagen[]', ['multiple' => '', 'accept' => 'image/png, image/jpeg']) !!}
                @error('imagen')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input class="btn-form-administracion" type="submit" value="Guardar">
                {!! Form::close() !!}
            </div>
        </div>
    </section>
@endsection
