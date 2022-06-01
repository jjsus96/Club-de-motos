@extends('layouts.app')
@section('title')
    Colaboradores | {{ env('APP_NAME') }}
@endsection
@section('content')
    <section>
        <div class="contenedor-administracion">
            <h1 class="titulo-inicio">Colaboradores</h1>
            <a class="enlace-administracion" href="{{ route('colaboradores.create') }}">Nuevo Colaborador</a>
            <div class="contenedor-tablas">
        <table class="tablas-administracion">
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
                        <button class="btn-general-administracion"><a href="{{ route('colaboradores.show', $colaborador->id) }}">Ver</a></button>
                        <button class="btn-general-administracion"><a href="{{ route('colaboradores.edit', $colaborador->id) }}">Editar</a></button>
                        {{ Form::open(['url' => route('colaboradores.destroy', $colaborador), 'method' => 'delete']) }}
                        <button class="btn-general-administracion-eliminar" type="submit" onclick="return eliminarColaborador('Eliminar Colaborador')"> Eliminar</button>
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
        function eliminarColaborador(value) {
            action = confirm(value) ? true : event.preventDefault()
        }
    </script>
@endsection
