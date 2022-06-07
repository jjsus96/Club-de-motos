@extends('layouts.app')
@section('title')
    Socios | {{ env('APP_NAME') }}
@endsection
@section('content')
    <section>
        <div class="contenedor-administracion">

            <a class="enlace-administracion" href="{{ route('socios.index') }}">Ver listado de socios</a>

            <div class="formulario-administracion">

                {!! Form::open(['route' => ['socios.store'], 'method' => 'POST', 'files' => true]) !!}

                <h1 class="titulo-formulario"> Nuevo Socio </h1>

                <label>Usuario:</label>
                {!! Form::select('usuario_id', $users, null, ['class' => 'select2', 'placeholder' => 'Seleccione un valor']) !!}
                @error('usuario_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <label>Nombre:</label>
                {!! Form::text('nombre_socio', null, ['placeholder' => 'Nombre']) !!}
                @error('nombre_socio')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <label>Apellidos:</label>
                {!! Form::text('apellidos', null, ['placeholder' => 'Apellidos']) !!}
                @error('apellidos')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <label>Fecha de nacimiento:</label>
                {!! Form::date('fecha_nacimiento', null, ['placeholder' => 'Fecha de nacimiento']) !!}
                @error('fecha_nacimiento')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <label>Teléfono:</label>
                {!! Form::tel('telefono', null, ['placeholder' => 'Teléfono']) !!}
                @error('telefono')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <label>Dirección:</label>
                {!! Form::text('direccion', null, ['placeholder' => 'Dirección']) !!}
                @error('direccion')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <label>Padrino:</label>
                {!! Form::text('padrino', null, ['placeholder' => 'Padrino']) !!}
                @error('padrino')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <label>Motocicleta:</label>
                {!! Form::text('motocicleta', null, ['placeholder' => 'Motocicleta']) !!}
                @error('motocicleta')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <label>Foto de Carnet:</label>
                {!! Form::file('foto_carnet', ['placeholder' => 'Foto de carnet', 'id' => 'foto_carnet']) !!}
                @error('foto_carnet')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <input class="btn-form-administracion" type="submit" value="GUARDAR">
                {!! Form::close() !!}

            </div>
        </div>
    </section>
@endsection
@section('customs-scripts')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endsection
