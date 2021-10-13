@extends('layouts.auth-master')

@section('title', '404')

@section('content')
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="card-body pt-0">

                            <div class="ex-page-content text-center">
                                <h1 class="text-dark">404!</h1>
                                <h3 class="">Perdão página não encontrada</h3>
                                <br>

                                <a class="btn btn-info mb-4 waves-effect waves-light" href="/dashboard/index"><i class="mdi mdi-home"></i> Voltar para o Dashboard</a>
                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p>© 2016 - {{  date('Y') }} JVS </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
