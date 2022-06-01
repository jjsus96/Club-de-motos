@extends('layouts.app')
@section('title')
    Galerías | {{ env('APP_NAME') }}
@endsection
@section('content')
    <section>
        <div class="contenedor-administracion">
            <a class="enlace-administracion" href="{{ route('galerias.index') }}">Ver listado de Galerías</a>
            <div class="formulario-administracion">
        {!! Form::model($galeria, ['route' => ['galerias.update', $galeria], 'method' => 'PUT', 'files' => true]) !!}
        <h1 class="titulo-formulario"> Editar Galería </h1>
        <label>Evento:</label>
        {!! Form::select('evento_id', $eventos, $galeria->evento_id, ['placeholder' =>  'Seleccionar un evento', 'readonly' => '']) !!}
        @error('evento_id')
        <span class="text-danger">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <label>Imagen:</label>
        {!! Form::file('imagen', ['id' => 'imagen', 'accept' => 'image/png, image/jpeg']) !!}<br>
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
