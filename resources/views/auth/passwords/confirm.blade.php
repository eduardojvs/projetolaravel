@extends('layouts.auth-master')

@section('title', 'Confirme a Sua Senha')

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
                                <h4 class="text-muted font-size-18 mb-1 text-center">Segurança!</h4>
                                <p class="text-muted text-center">Confirme a sua senha</p>
                                <form class="form-horizontal mt-4" method="POST" action="{{ route('password.confirm') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="useremail">Senha</label>
                                          <input id="password" type="password" class="form-control @error('password') inválida @enderror" name="password" required autocomplete="current-password" placeholder="Digite a sua senha...">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-0 row">
                                       <button class="btn btn-primary btn-block waves-effect waves-light" id="register" type="submit">{{ __('Confirme a sua senha') }}</button>
                                        @if (Route::has('password.request'))
                                        <br>
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Esqueceu a sua senha?') }}
                                        </a>
                                        @endif
                                    </div>

                                    <div class="mt-4 text-center">
                                        <p class="mb-0">Cadastrando-se você concorda com os <a href="#" class="text-primary">Termos de Uso.</a></p>
                                    </div>
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
