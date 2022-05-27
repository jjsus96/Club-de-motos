@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifica tu Email') }}</div>

                <div class="formulario-login">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Se ha enviado un correo con un link de Verificación.') }}
                        </div>
                    @endif

                    {{ __('Compruebe su correo electrónico para obtener el link de Verificación.') }}
                    {{ __('Si no ha recibido el link:') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn-form">{{ __('Reenviar') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
