@extends('layouts.app')
@section('title')
    Galerías | {{ env('APP_NAME') }}
@endsection
@section('content')
    <a href="/galerias">Ver listado de Imágenes</a>
    <br>
    <h2>Editar Imagen</h2>
    <div>
        {!! Form::model($galeria, ['route' => ['galerias.update', $galeria], 'method' => 'PUT', 'files' => true]) !!}
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
        <input type="submit" value="Guardar">
        {!! Form::close() !!}
    </div>
@endsection
