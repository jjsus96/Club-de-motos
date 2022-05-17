@extends('layouts.app')
@section('title')
    Socios | {{ env('APP_NAME') }}
@endsection
@section('content')
    <a href="/socios">Ver listado de socios</a>
    <br>
    <h2>Nuevo Socio</h2>
    <div>
        {!! Form::open(['route' => ['socios.store'], 'method' => 'POST', 'files' => true]) !!}
        <label>Usuario:</label>
        {!! Form::select('usuario_id', $users, null, ['class' => 'select2', 'placeholder' => 'Seleccione un valor']) !!}<br>
        @error('usuario_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <label>Nombre:</label>
        {!! Form::text('nombre_socio', null, ['placeholder' => 'Nombre']) !!}<br>
        @error('nombre_socio')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <label>Apellidos:</label>
        {!! Form::text('apellidos', null, ['placeholder' => 'Apellidos']) !!}<br>
        @error('apellidos')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <label>Fecha de nacimiento:</label>
        {!! Form::date('fecha_nacimiento', null, ['placeholder' => 'Fecha de nacimiento']) !!}<br>
        @error('fecha_nacimiento')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <label>Teléfono:</label>
        {!! Form::tel('telefono', null, ['placeholder' => 'Teléfono']) !!}<br>
        @error('telefono')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <label>Dirección:</label>
        {!! Form::text('direccion', null, ['placeholder' => 'Dirección']) !!}<br>
        @error('direccion')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <label>Padrino:</label>
        {!! Form::text('padrino', null, ['placeholder' => 'Padrino']) !!}<br>
        @error('padrino')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <label>Motocicleta:</label>
        {!! Form::text('motocicleta', null, ['placeholder' => 'Motocicleta']) !!}<br>
        @error('motocicleta')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <label>Foto de Carnet:</label>
        {!! Form::file('foto_carnet', ['placeholder' => 'Foto de carnet', 'id' => 'foto_carnet']) !!}<br>
        @error('foto_carnet')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <input type="submit" value="Guardar">
        {!! Form::close() !!}
    </div>
@endsection
@section('customs-scripts')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endsection
