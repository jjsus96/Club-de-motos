<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <tittle>Laravel<tittle/>
        <style>
            body {
                margin: auto;
                padding: 50px;
            }

            table, td, th {
                border: 1px solid black;
            }

            table {
                border-collapse: collapse;
                width: 100%;
            }

            th {
                height: 70px;
            }

            td {
                height: 30px;
            }

            .button {
                background-color: #4CAF50;
                border: none;
                color: white;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
            }
        </style>
    </head>
    <body>
        <h2>Listado de patrocinadores</h2>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
            @foreach ($patrocinadores as $patrocinador)
                <tr>
                    <td>{{ $patrocinador->nombre_patrocinador }}</td>
                    <td>{{ $patrocinador->telefono_patrocinador }}</td>
                    <td>{{ $patrocinador->email_patrocinador }}</td>
                    <td>
                        <a href="{{ route('patrocinadores.show', $patrocinador->id) }}">Ver</a>
                        <a href="{{ route('patrocinadores.edit', $patrocinador->id) }}">Editar</a>
                        {{ Form::open(['url' => route('patrocinadores.destroy', $patrocinador->id), 'method' => 'delete']) }}
                        <button type="submit" onclick="return eliminarPatrocinador('Eliminar Patrocinador')"> Eliminar</button>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>
        <br>
        <a href="{{ route('patrocinadores.create')}}">Nuevo patrocinador</a>
    </body>

    <script>
        function eliminarPatrocinador(value) {
            action = confirm(value) ? true : event.preventDefault()
        }
    </script>

<html>
