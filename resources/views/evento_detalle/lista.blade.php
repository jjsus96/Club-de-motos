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

            th {m 
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
        <h2>Listado de EventoDetalle</h2>
        <table>
            <tr>
                <th>Evento</th>
                <th>Usuario</th>
                <th>Acepta</th>
                <th>Rechaza</th>
                <th>Acciones</th>
            </tr>
            @foreach ($eventodetalles as $eventodetalle)
                <tr>
                    <td>{{ $eventodetalle->evento_id }}</td>
                    <td>{{ $eventodetalle->usuario_id }}</td>
                    <td>{{ $eventodetalle->acepta }}</td>
                    <td>{{ $eventodetalle->rechaza }}</td>
                    <td>
                        <a href="{{ route('eventodetalles.show', $eventodetalle->id) }}">Ver</a>
                        <a href="{{ route('eventodetalles.edit', $eventodetalle->id) }}">Editar</a>
                        {{ Form::open(['url' => route('eventodetalles.destroy', $eventodetalle->id), 'method' => 'delete']) }}
                        <button type="submit" onclick="return eliminarEventodetalle('Eliminar EventoDetalle')"> Eliminar</button>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>
        <br>
        <a href="{{ route('eventodetalles.create')}}">Nuevo EventoDetalle</a>
    </body>

    <script>
        function eliminarEventodetalle(value) {
            action = confirm(value) ? true : event.preventDefault()
        }
    </script>

<html>
