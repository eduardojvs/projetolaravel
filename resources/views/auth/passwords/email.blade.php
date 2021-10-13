@extends('layouts.auth-master')

@section('title', 'Confirmação do Email')

@section('content')
 <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="card-body pt-0">
                            <h3 class="text-center mt-4">
                                <a href="/" class="logo logo-admin"><img src="{{ URL::asset('/images/logo-JVS/LOGO_JVS_LARANJA_Prancheta_1.png')}}" height="80" alt="logo"></a>
                            </h3>
                            <div class="p-3">
                                <h4 class="text-muted font-size-18 mb-1 text-center">Segurança!</h4>
                                <p class="text-muted text-center">Resete a sua senha!</p>

                     @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                                <form class="form-horizontal mt-4" method="POST" action="{{ route('password.email') }}">
                                       @csrf
                                    <div class="form-group">
                                        <label for="username">E-mail</label>
                                         <input id="email" type="email" class="form-control @error('email') inválido @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Digite o seu e-mail...">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                     <div class="mt-4">
                                        <button class="btn btn-primary btn-block waves-effect waves-light" id="register" type="submit"> {{ __('Enviar link') }}</button>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <p class="mb-0">Cadastrando-se você concorda com os <a href="#" class="text-primary">Termos of Uso</a>.</p>
                                    </div>
                                   </form>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p>Não possui uma conta? <a href="/register" class="text-primary"> Cadastra-se agora </a></p>
                        <p>© 2016 - {{  date('Y') }} JVS</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
