<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <tittle>Laravel<tittle/>
        <br>
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
        </style>
    </head>
    <body>
        <a href="/eventos">Ver listado de Eventos</a>
        <br>
        <h2>Editar Evento</h2>
        <div>
            {!! Form::model($evento, ['route'=>['eventos.update',$evento], 'method'=>'PUT', 'files' => true]) !!}
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
                <input type="submit" value="Guardar">
            {!! Form::close() !!}
        </div>
    </body>
<html>
