<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{URL::to('css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{URL::to('css/main.css')}}" rel="stylesheet">
    <title>Store.com</title>
</head>
<body>
    @include('layouts.includes.navbar')
    <div class="container">    
       @include('layouts.includes.alerts')
       @yield('content')
    </div>
<script src="{{URL::to('js/jquery.js')}}"></script>
<script src="{{URL::to('js/bootstrap.js')}}"></script>
@yield('script')
</body>
</html>