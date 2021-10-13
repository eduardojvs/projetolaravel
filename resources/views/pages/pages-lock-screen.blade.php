@extends('layouts.auth-master')

@section('title', 'Lock Screen')

@section('content')
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="card-body pt-0">
                            <h3 class="text-center mt-4">
                                <a href="/dashboard/index" class="logo logo-admin"><img src="{{ URL::asset('/images/logo-dark.png')}}"
                                        height="30" alt="logo">
                                </a>
                            </h3>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p>Not you ? return <a href="/pages/pages-login" class="text-primary"> Sign In </a> </p>
                        <p>© 2016 - {{  date('Y') }} JVS
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
