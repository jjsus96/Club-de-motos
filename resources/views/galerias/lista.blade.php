@extends('layouts.app')
@section('title')
    Galerias | {{ env('APP_NAME') }}
@endsection
@section('content')
    <section>
        <div class="contenedor-administracion">
            <h1 class="titulo-inicio">Galerias</h1>
            <a class="enlace-administracion" href="{{ route('galerias.create') }}">Nueva Galería</a>
            <div class="contenedor-tablas">
                <table class="tablas-administracion">
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
                                <button class="btn-general-administracion"><a href="{{ route('galerias.show', $galeria->id) }}">Ver</a></button>
                                <button class="btn-general-administracion"><a href="{{ route('galerias.edit', $galeria->id) }}">Editar</a></button>
                                {{ Form::open(['url' => route('galerias.destroy', $galeria), 'method' => 'delete']) }}
                                <button class="btn-general-administracion-eliminar" type="submit" onclick="return eliminarGaleria('Eliminar Galería')">
                                    Eliminar</button>
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
        function eliminarGaleria(value) {
            action = confirm(value) ? true : event.preventDefault()
        }
    </script>
@endsection
