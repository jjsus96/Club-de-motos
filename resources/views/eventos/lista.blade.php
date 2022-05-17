@extends('layouts.app')
@section('title')
    Eventos | {{ env('APP_NAME') }}
@endsection
@section('content')
    <h2>Listado Eventos</h2>
    <table>
        <tr>
            <th>Nombre Evento</th>
            <th>Cartel</th>
            <th>Fecha Inicio</th>
            <th>Descripción</th>
            <th>Colaborador</th>
            <th>Patrocinador</th>
            <th>Acciones</th>
        </tr>
        @foreach ($eventos as $evento)
            <tr>
                <td>{{ $evento->nombre_evento }}</td>
                <td>{{ $evento->cartel }}</td>
                <td>{{ $evento->fecha_inicio }}</td>
                <td>{{ $evento->descripcion }}</td>
                <td>{{ $evento->colaborador->nombre_colaborador }}</td>
                <td>{{ $evento->patrocinador->nombre_patrocinador }}</td>
                <td>
                    <a href="{{ route('eventos.show', $evento->id) }}">Ver</a>
                    <a href="{{ route('eventos.edit', $evento->id) }}">Editar</a>
                    {{ Form::open(['url' => route('eventos.destroy', $evento), 'method' => 'delete']) }}
                    <button type="submit" onclick="return eliminarEvento('Eliminar Evento')"> Eliminar</button>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>
    <br>
    <a href="{{ route('eventos.create') }}">Nuevo Evento</a>
@endsection
@section('customs-scripts')
    <script>
        function eliminarEvento(value) {
            action = confirm(value) ? true : event.preventDefault()
        }
    </script>
@endsection
