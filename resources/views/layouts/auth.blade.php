<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('css/icons.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('css/app.min.css')}}" rel="stylesheet" type="text/css">
</head>
<body class="account-body accountbg">
<div class="container">
    @yield('content')
</div>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/waves.js')}}"></script>
<script src="{{asset('js/feather.min.js')}}"></script>
<script src="{{asset('js/simplebar.min.js')}}"></script>
</body>
</html>

