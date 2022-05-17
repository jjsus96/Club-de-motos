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

            input[type=tel], select {
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
            }

            input[type=email], select {
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
        <a href="/eventodetalles">Ver listado de EventoDetalle</a>
        <br>
        <h2>Editar EventoDetalle</h2>
        <div>
            {!! Form::model($eventodetalle, ['route'=>['eventodetalles.update',$eventodetalle], 'method'=>'PUT']) !!}
                <label>Evento:</label>
                {!! Form::text('evento_id', null, ['placeholder' => 'Evento']) !!}
                <label>Usuario:</label>
                {!! Form::text('Usuario_id', null, ['placeholder' => 'Usuario']) !!}
                <label>Acepta:</label>
                {!! Form::text('acepta', null, ['placeholder' => 'Acepta']) !!}
                <label>Rechaza:</label>
                {!! Form::text('rechaza', null, ['placeholder' => 'Rechaza']) !!}
                <input type="submit" value="Guardar">
            {!! Form::close() !!}
        </div>
    </body>
<html>
