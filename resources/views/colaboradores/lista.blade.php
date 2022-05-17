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
        <h2>Listado de colaboradores</h2>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
            @foreach ($colaboradores as $colaborador)
                <tr>
                    <td>{{ $colaborador->nombre_colaborador }}</td>
                    <td>{{ $colaborador->telefono_colaborador }}</td>
                    <td>{{ $colaborador->email_colaborador }}</td>
                    <td>
                        <a href="{{ route('colaboradores.show', $colaborador->id) }}">Ver</a>
                        <a href="{{ route('colaboradores.edit', $colaborador->id) }}">Editar</a>
                        {{ Form::open(['url' => route('colaboradores.destroy', $colaborador), 'method' => 'delete']) }}
                        <button type="submit" onclick="return eliminarColaborador('Eliminar Colaborador')"> Eliminar</button>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>
        <br>
        <a href="{{ route('colaboradores.create')}}">Nuevo colaborador</a>
    </body>

    <script>
        function eliminarColaborador(value) {
            action = confirm(value) ? true : event.preventDefault()
        }
    </script>

<html>
