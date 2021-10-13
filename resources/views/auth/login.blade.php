@extends('layouts.auth-master')

@section('title', 'Login | JVS')

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
                                <h4 class="text-muted font-size-18 mb-1 text-center">Bem vindo !</h4>
                                <p class="text-muted text-center">Efetue o login para acessar JVS Sistemas.</p>
                                <form method="POST" class="form-horizontal mt-4" action="{{ route('login') }}">
                                    @csrf

                                    <div class="form-group">

                                        <label for="username">E-mail:</label>
                                        <input id="email" type="email" class="form-control @error('email') inválido @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">


                                    </div>

                                    <div class="form-group">

                                        <label for="userpassword">Senha</label>
                                        <input id="password" type="password" class="form-control @error('password') inválida @enderror" name="password" required autocomplete="current-password" placeholder="Senha">
                                        @error('email')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>

                                    <div class="form-group row mt-4">
                                        <div class="col-6">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="remember" id="customControlInline" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="customControlInline">{{ __('Lembre de mim') }}</label>
                                            </div>
                                        </div>

                                        <div class="col-6 text-right">
                                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Acessar</button>
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 row">
                                        <div class="col-12 mt-4">
                                            <a href="{{ route('password.request') }}" class="text-muted"><i class="mdi mdi-lock"></i> Esqueceu a sua senha?</a>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p>Não possui uma conta? <a href="/register" class="text-primary"> Cadastre-se agora </a></p>
                        <p>© 2016 - {{  date('Y') }} JVS</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
