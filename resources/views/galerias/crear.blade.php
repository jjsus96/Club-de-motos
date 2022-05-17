@extends('layouts.app')
@section('title')
    Galerías | {{ env('APP_NAME') }}
@endsection
@section('content')
    <a href="{{ route('galerias.index') }}">Ver listado de Galerías</a>
    <br>
    <h2>Nueva galería</h2>
    <div>
        {!! Form::open(['route' => ['galerias.store'], 'method' => 'POST', 'files' => true]) !!}
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
        <input type="submit" value="Guardar">
        {!! Form::close() !!}
    </div>
@endsection
