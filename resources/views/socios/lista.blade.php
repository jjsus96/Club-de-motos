@extends('layouts.app')
@section('title')
Socios | {{ env('APP_NAME') }}
@endsection
@section('content')
    <h2>Listado Socios</h2>
    <table>
        <tr>
            <th>Usuario</th>
            <th>Nombre</th>
            <th>Apelliods</th>
            <th>Fecha de nacimiento</th>
            <th>Teléfono</th>
            <th>Dirección</th>
            <th>Padrino</th>
            <th>Motocicleta</th>
            <th>Foto de carnet</th>
            <th>Acciones</th>
        </tr>
        @foreach ($socios as $socio)
            <tr>
                <td>{{ $socio->usuario_id }}</td>
                <td>{{ $socio->nombre_socio }}</td>
                <td>{{ $socio->apellidos }}</td>
                <td>{{ $socio->fecha_nacimiento }}</td>
                <td>{{ $socio->telefono }}</td>
                <td>{{ $socio->direccion }}</td>
                <td>{{ $socio->padrino }}</td>
                <td>{{ $socio->motocicleta }}</td>
                <td>{{ $socio->foto_carnet }}</td>
                <td>
                    <a href="{{ route('socios.show', $socio->id) }}">Ver</a>
                    <a href="{{ route('socios.edit', $socio->id) }}">Editar</a>
                    {{ Form::open(['url' => route('socios.destroy', $socio), 'method' => 'delete']) }}
                    <button type="submit" onclick="return eliminarSocio('Eliminar Socio')"> Eliminar</button>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>
    <br>
    <a href="{{ route('socios.create') }}">Nuevo Socio</a>
@endsection
@section('customs-scripts')
    <script>
        function eliminarSocio(value) {
            action = confirm(value) ? true : event.preventDefault()
        }
    </script>
@endsection
