@extends('layouts.auth-master')

@section('title', 'Login')

@section('content')
     <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="card-body pt-0">
                            <h3 class="text-center mt-4">
                                <a href="/dashboard/index" class="logo logo-admin"><img src="{{ URL::asset('/images/logo-dark.png')}}"
                                        height="30" alt="logo"></a>
                            </h3>
                            <div class="p-3">
                                <h4 class="text-muted font-size-18 mb-1 text-center">Bem vindo de volta!</h4>
                                <p class="text-muted text-center">Cadastre-se para continuar no Portal JVS</p>
                                <form class="form-horizontal mt-4" action="/">
                                    <div class="form-group">
                                        <label for="username">Usuário</label>
                                        <input type="text" class="form-control" id="username" placeholder="Enter username">
                                    </div>
                                    <div class="form-group">
                                        <label for="userpassword">Senha</label>
                                        <input type="password" class="form-control" id="userpassword" placeholder="Enter password">
                                    </div>
                                    <div class="form-group row mt-4">
                                        <div class="col-6">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customControlInline">
                                                <label class="custom-control-label" for="customControlInline">Lembrar de Mim
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-6 text-right">
                                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Login</button>
                                        </div>
                                    </div>
                                    <div class="form-group mb-0 row">
                                        <div class="col-12 mt-4">
                                            <a href="/pages/pages-recoverpw" class="text-muted"><i class="mdi mdi-lock"></i> Esqueceu a sua senha? </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p> Não tem uma conta? <a href="/pages/pages-register" class="text-primary"> Cadastre-se agora </a></p>
                        <p>© 2016 - {{  date('Y') }} JVS
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
