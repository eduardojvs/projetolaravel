@extends('layouts.auth-master')

@section('title', 'Verifique a sua Senha | JVS')

@section('content')
 <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="card-body pt-0">
                            <h3 class="text-center mt-4">
                                <a href="/" class="logo logo-admin"><img src="{{ URL::asset('/images/logo-JVS/LOGO_JVS_LARANJA_Prancheta_1.png')}}"  height="30" alt="logo"></a>
                            </h3>
                            <div class="p-3">
                                <h4 class="text-muted font-size-18 mb-1 text-center">Segurança !</h4>
                                <p class="text-muted text-center">{{ __('Verifique o seu endereço de e-mail') }}.</p>
                             @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Um link para a verificação foi enviado ao seu e-mail.') }}
                        </div>
                    @endif

                    {{ __('Antes de proceder consulte o seu e-mail para o link de verificação.') }}
                    {{ __('Se você não recebeu o e-mail') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Clique aqui para enviar novamente.') }}</button>.
                    </form>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p>Já possui uma conta? <a href="/login" class="text-primary"> Login </a> </p>
                        <p>© 2016 - {{  date('Y') }} JVS</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
