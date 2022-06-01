@extends('layouts.app')
@section('title')
    Usuarios | {{ env('APP_NAME') }}
@endsection
@section('content')
    <section>
        <div class="contenedor-administracion">
            <h1 class="titulo-inicio">Usuarios</h1>
            <a class="enlace-administracion" href="{{ route('users.create') }}">Nuevo Usuario</a>
            <div class="contenedor-tablas">
                <table class="tablas-administracion">
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Contraseña</th>
                        <th>Avatar</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->password }}</td>
                            <td>{{ $user->avatar }}</td>
                            <td>{{ $user->role->name }}</td>
                            <td>
                                <button class="btn-general-administracion"><a href="{{ route('users.show', $user->id) }}">Ver</a></button>
                                <button class="btn-general-administracion"><a href="{{ route('users.edit', $user->id) }}">Editar</a></button>
                                {{ Form::open(['url' => route('users.destroy', $user), 'method' => 'delete']) }}
                                <button class="btn-general-administracion-eliminar" type="submit" onclick="return eliminarUser('Eliminar Usuario')"> Eliminar</button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </section>
@endsection
@section('customs-scripts')
    <script>
        function eliminarUser(value) {
            action = confirm(value) ? true : event.preventDefault()
        }
    </script>
@endsection
