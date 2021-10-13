@extends('layouts.auth-master')

@section('title', 'Resete a sua Senha')

@section('content')
 <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="card-body pt-0">
                            <h3 class="text-center mt-4">
                                <a href="/" class="logo logo-admin"><img src="{{ URL::asset('/images/logo-JVS/LOGO_JVS_LARANJA_Prancheta_1.png')}}" height="30" alt="logo"></a>
                            </h3>
                            <div class="p-3">
                                <h4 class="text-muted font-size-18 mb-1 text-center">Resete a sua senha!</h4>
                                <p class="text-muted text-center">Resetar Senha</p>
                                <form class="form-horizontal mt-4" method="POST" action="{{ route('password.update') }}">

                                    @csrf
                                    <input type="hidden" name="token" value="{{ $token }}">
                                    <div class="form-group">
                                        <label for="username">E-mail</label>
                                          <input id="email" type="email" class="form-control @error('email') inválido @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="Digite o seu e-mail">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label for="userpassword">Senha</label>
                                       <input id="password" type="password" class="form-control @error('password') inválida @enderror" name="password" required autocomplete="new-password" placeholder="Digite a sua senha...">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                   <div class="form-group">
                                        <label for="userpassword">{{ __('Confirme a sua senha') }}</label>
                                        <input type="password" name="password_confirmation" class="form-control" id="userconfirmpassword" placeholder="Confirme a sua senha..">
                                    </div>

                                    <div class="mt-4">
                                        <button class="btn btn-primary btn-block waves-effect waves-light" id="register" type="submit"> {{ __('Reset') }}</button>
                                    </div>

                                    <div class="mt-4 text-center">
                                        <p class="mb-0">Cadastrando-se você concorda com os <a href="#" class="text-primary">Termos de uso</a>.</p>
                                    </div>

                                   </form>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p>Não possui uma conta? <a href="/register" class="text-primary"> Cadastrando-se agora </a></p>
                        <p>© 2016 - {{  date('Y') }} JVS </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
