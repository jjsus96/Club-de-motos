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
        <h2>Listado usuarios</h2>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Contraseña</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->password }}</td>
                    <td>{{ $user->role->name }}</td>
                    <td>
                        {{-- <a href="/users/ver/{{$user->id}}">Ver</a> --}}
                        <a href="{{ route('users.show', $user->id) }}">Ver</a>
                        <a href="{{ route('users.edit', $user->id) }}">Editar</a>
                        {{ Form::open(['url' => route('users.destroy', $user), 'method' => 'delete']) }}
                        <button type="submit" onclick="return eliminarUser('Eliminar Usuario')"> Eliminar</button>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>
        <br>
        <a href="{{ route('users.create')}}">Nuevo usuario</a>
    </body>

    <script>
        function eliminarUser(value) {
            action = confirm(value) ? true : event.preventDefault()
        }
    </script>

<html>
