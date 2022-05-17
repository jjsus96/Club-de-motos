@extends('layouts.app')
@section('title')
    Galerías | {{ env('APP_NAME') }}
@endsection
@section('content')
    <h2>Listado de Galerias</h2>
    <table>
        <tr>
            <th>Imagen</th>
            <th>Evento</th>
            <th>Acciones</th>
        </tr>
        @foreach ($galerias as $galeria)
            <tr>
                <td>{{ $galeria->imagen }}</td>
                <td>{{ $galeria->evento_id }}</td>
                <td>
                    <a href="{{ route('galerias.show', $galeria->id) }}">Ver</a>
                    <a href="{{ route('galerias.edit', $galeria->id) }}">Editar</a>
                    {{ Form::open(['url' => route('galerias.destroy', $galeria), 'method' => 'delete']) }}
                    <button type="submit" onclick="return eliminarGaleria('Eliminar Galería')"> Eliminar</button>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>
    <br>
    <a href="{{ route('galerias.create') }}">Nueva Galería</a>
@endsection
@section('customs-scripts')
    <script>
        function eliminarGaleria(value) {
            action = confirm(value) ? true : event.preventDefault()
        }
    </script>
@endsection
