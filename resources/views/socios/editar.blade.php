<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <tittle>Laravel<tittle/>
        <br>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <style>
            body {
                margin: auto;
                padding: 50px;
            }
            input[type=text], select {
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
            }
            input[type=submit] {
                width: 100%;
                background-color: #4CAF50;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }
            input[type=submit]:hover {
                background-color: #45a049;
            }
            div {
                border-radius: 5px;
                background-color: #f2f2f2;
                padding: 20px;
            }

            .text-danger {
                color: red;
            }
        </style>
    </head>
    <body>
        <a href="/socios">Ver listado de usuarios</a>
        <br>
        <h2>Nuevo Socio</h2>
        <div>
            {!! Form::model($socio, ['route'=>['socios.update', $socio], 'method' => 'PUT', 'files' => true]) !!}
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
        <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
        </script>
    </body>
<html>
