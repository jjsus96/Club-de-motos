@extends('layouts.app')

@section('content')
    <section>
        <h1 class="titulo-inicio">Cuenta</h1>
        <p>Sesión Iniciada</p>

                <div>

                    {{ Form::open(['route' => ['logout'], 'method' => 'POST', 'id' => 'logout-form']) }}
                    {{ Form::close() }}
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>

                <div class="botones-cuenta">

                <button class="btn-form"><a href="{{ url('usuario', Auth::user()) }}">Datos</a></button>

                <button class="btn-logout"><a class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="mdi mdi-logout font-size-16 align-middle me-1"></i>
                    {{ __('Logout') }}
                </a></button>

            </div>
    </section>
@endsection
