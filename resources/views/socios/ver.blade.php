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
        <a href="/socios">Ver listado de Socios</a>
        <br>
        <h2>Ver alumno</h2>
        <div>
            <p> Usuario: {{ $socio->usuario_id}}</p>
            <p> Nombre: {{ $socio->nombre_socio}}</p>
            <p> Apellidos: {{ $socio->apellidos}}</p>
            <p> Fecha de nacimiento: {{ $socio->fecha_nacimiento}}</p>
            <p> Teléfono: {{ $socio->telefono}}</p>
            <p> Dirección: {{ $socio->direccion}}</p>
            <p> Padrino: {{ $socio->padrino}}</p>
            <p> Motocicleta: {{ $socio->motocicleta}}</p>
            <p> Foto de Carnet: {{ $socio->foto_carnet}}</p>
        </div>
    </body>
<html>
