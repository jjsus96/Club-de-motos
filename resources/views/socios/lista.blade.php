@extends('layouts.app')
@section('title')
Socios | {{ env('APP_NAME') }}
@endsection
@section('content')
<section>
    <div class="contenedor-tablas">
        <table class="tablas-administracion">
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
                <th>Estado</th>
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
                        <div>
                            {!! Form::open(['route'=>['socios.estado', $socio->id], 'method'=>'POST']) !!}
                            @if ($socio->estado == 'activo')
                            <button type="submit" id="estado" class="btn btn-danger">Desactivar</button>
                            @else
                            <button type="submit" id="estado" class="btn btn-">Activar</button>
                            @endif
                            {!! Form::close() !!}
                        </div>
                    </td>
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
    </div>
</section>
@endsection
@section('customs-scripts')
    <script>
        function eliminarSocio(value) {
            action = confirm(value) ? true : event.preventDefault()
        }
    </script>
@endsection
