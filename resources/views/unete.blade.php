@extends('layouts.app')

@section('content')
    <section>
        <div class="contenedor-administracion">
            <div class="formulario-administracion">

                {!! Form::open(['route' => ['socio.crear'], 'method' => 'POST', 'files' => true]) !!}

                <h1 class="titulo-formulario"> Únete </h1>
                <div class="ocultar">
                    <label>Usuario:</label>
                    {!! Form::text('usuario_id', Auth::user()->id, ['placeholder' => 'Usuario', 'value' => Auth::user()->id, 'readonly' => true]) !!}
                    @error('usuario_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

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
