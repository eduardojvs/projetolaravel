@extends('layouts.auth-master')

@section('title', 'Cadastre-se | JVS')

@section('content')
 <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">

                    <div class="card overflow-hidden">
                        <div class="card-body pt-0">

                            <h3 class="text-center mt-4">
                                <a href="/" class="logo logo-admin"><img src="{{ URL::asset('/images/logo-JVS/LOGO_JVS_LARANJA_Prancheta_1.png')}}"
                                     height="80" alt="logo"></a>
                            </h3>

                            <div class="p-3">
                                <h4 class="text-muted font-size-18 mb-1 text-center">Cadastre-se Grátis</h4>
                                <p class="text-muted text-center">Consiga a sua conta de acesso ao sistema JVS.</p>
                                <form class="form-horizontal mt-4" method="POST" action="{{ route('register') }}">

                                    @csrf

                                    <div class="form-group">
                                        <label for="useremail">E-mail</label>
                                          <input type="email" name="email" class="form-control @error('email') inválido @enderror" name="email" value="{{ old('email') }}" id="useremail" placeholder="Digite o seu email..." autocomplete="email">
                                        @error('email')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="username">Nome</label>
                                        <input type="text" name="name" value="{{ old('name') }}" required autocomplete="name" class="form-control @error('name') inválido @enderror" autofocus id="name" placeholder="Digite o seu nome...">
                                        @error('name')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="userpassword">{{ __('Senha') }}</label>
                                        <input type="password" class="form-control @error('password') inválida @enderror" name="password" required autocomplete="new-password" id="userpassword" placeholder="Digite a sua senha...">
                                        @error('password')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="userpassword">{{ __('Confirme a sua senha') }}</label>
                                    <input type="password" name="password_confirmation" class="form-control" id="userconfirmpassword" placeholder="Digite a sua senha novamente...">
                                    </div>

                                    <div class="form-group row mt-4">
                                        <div class="col-12 text-right">
                                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Cadastrar</button>
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 row">
                                        <div class="col-12 mt-4">
                                            <p class="text-muted mb-0 font-size-14">Ao se cadastrar na JVS você concorda com os  <a href="#" class="text-primary">Termos de Uso</a>.</p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5 text-center">
                        <p>Não possui uma conta? <a href="/login" class="text-primary"> Login </a> </p>
                        <p>© 2016 - {{  date('Y') }} JVS</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
