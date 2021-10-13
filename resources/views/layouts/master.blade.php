<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8" />
    <title> @yield('title') </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Portal de Aplicativos JVS" name="description" />
    <meta content="JVS" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('/images/favicon.png')}}">

     <!-- headerCss -->
    @yield('headerCss')

    <!-- Bootstrap Css -->
    <link href="{{ URL::asset('/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ URL::asset('/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ URL::asset('/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/css/style.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{ URL::asset('/libs/jvs/externo.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/libs/jvs/grid.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />

    {{-- DataTables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap4.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- customCss -->
    @yield('customCss')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.6.0/dt-1.11.3/cr-1.5.4/date-1.1.1/fh-3.2.0/r-2.2.9/rr-1.2.8/sb-1.2.2/sp-1.4.0/datatables.min.css"/>

<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.6.0/dt-1.11.3/cr-1.5.4/date-1.1.1/fh-3.2.0/r-2.2.9/rr-1.2.8/sb-1.2.2/sp-1.4.0/datatables.min.js"></script>
</head>

<body data-sidebar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">

         @include('layouts/partials/header')

         @include('layouts/partials/sidebar')

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                  <!-- content -->
                   @yield('content')


                  @include('layouts/partials/footer')

                </div>
                <!-- end main content-->
            </div>
            <!-- END layout-wrapper -->

             @include('layouts/partials/rightbar')

            <!-- JAVASCRIPT -->
            <script src="{{ URL::asset('/libs/jquery/jquery.min.js')}}"></script>
            <script src="{{ URL::asset('/libs/bootstrap/bootstrap.min.js')}}"></script>
            <script src="{{ URL::asset('/libs/metismenu/metismenu.min.js')}}"></script>
            <script src="{{ URL::asset('/libs/simplebar/simplebar.min.js')}}"></script>
            <script src="{{ URL::asset('/libs/node-waves/node-waves.min.js')}}"></script>
            <script src="{{ URL::asset('/libs/jquery-sparkline/jquery-sparkline.min.js')}}"></script>
            <script>var APP_URL = "{{ URL::to('') }}";</script>
            <script src="{{ URL::asset('/libs/jvs/externo.js')}}"></script>
            <script src="{{ URL::asset('/libs/jvs/grid.js')}}"></script>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>

            {{-- DataTables
                <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script> --}}
            <script src="{{ URL::asset('/libs/datatables/datatables.min.js')}}"></script>
            <script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap4.min.js"></script>
            <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
            <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.colVis.min.js"></script>

            <!-- footerScript -->
            @yield('footerScript')

            <!-- App js -->
            <script src="{{ URL::asset('/js/app.min.js')}}"></script>
            <style>
                .dataTables_wrapper .dataTables_paginate .paginate_button {
                    padding: 0;
                }
            </style>
</body>

</html>
