<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <title> @yield('title')  | JVS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Portal de Aplicativos JVS" name="description" />
    <meta content="JVS" name="author" />

    <!-- Bootstrap Css -->
    <link href="{{ URL::asset('/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ URL::asset('/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ URL::asset('/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body>

    @yield('content')

    <!-- JAVASCRIPT -->
    <script src="{{ URL::asset('/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{ URL::asset('/libs/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{ URL::asset('/libs/metismenu/metismenu.min.js')}}"></script>
    <script src="{{ URL::asset('/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{ URL::asset('/libs/node-waves/node-waves.min.js')}}"></script>
    <script src="{{ URL::asset('/libs/jquery-sparkline/jquery-sparkline.min.js')}}"></script>
    <!-- App js -->
    <script src="{{ URL::asset('/js/app.min.js')}}"></script>
</body>

</html>
