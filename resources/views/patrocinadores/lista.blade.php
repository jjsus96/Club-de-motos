@extends('layouts.app')
@section('title')
    Socios | {{ env('APP_NAME') }}
@endsection
@section('content')
    <section>
        <div class="contenedor-administracion">
            <h1 class="titulo-inicio">Patrocinadores</h1>
            <a class="enlace-administracion" href="{{ route('patrocinadores.create') }}">Nuevo Patrocinador</a>
            <div class="contenedor-tablas">
                <table class="tablas-administracion">
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
                        <button class="btn-general-administracion"><a href="{{ route('patrocinadores.show', $patrocinador->id) }}">Ver</a></button>
                        <button class="btn-general-administracion"><a href="{{ route('patrocinadores.edit', $patrocinador->id) }}">Editar</a></button>
                        {{ Form::open(['url' => route('patrocinadores.destroy', $patrocinador->id), 'method' => 'delete']) }}
                        <button class="btn-general-administracion-eliminar" type="submit" onclick="return eliminarPatrocinador('Eliminar Patrocinador')"> Eliminar</button>
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
        function eliminarPatrocinador(value) {
            action = confirm(value) ? true : event.preventDefault()
        }
    </script>
@endsection
