<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') .(isset($title)? ' - '.$title: '')}}</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('css/jquery-ui.min.css')}}" rel="stylesheet">
  <link href="{{asset('css/icons.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('css/metisMenu.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://mannatthemes.com/dastyle/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css">
  <link href="{{asset('css/app.min.css')}}" rel="stylesheet" type="text/css">

  @yield('style')
</head>
<body class="dark-sidenav">
<div class="left-sidenav">
  <div class="brand">
    <a href="{{ url('/') }}" class="logo">
      <span>
        <img src="{{asset('images/logo2-150x150.png')}}" alt="my logo" class="logo-lg logo-light">
      </span>
    </a>
  </div>
  <div class="menu-content h-100" data-simplebar>
    @include('layouts.menu')
  </div>
</div>
<div class="page-wrapper">
  <div class="topbar">
    <nav class="navbar-custom">
      <ul class="list-unstyled topbar-nav float-right mb-0">
        <li class="dropdown">
          <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
             aria-haspopup="false" aria-expanded="false"><span class="ml-1 nav-user-name hidden-sm">{{--{{ auth()->user()->name }}--}}</span>
            <img src="{{asset('images/users/user.png')}}" alt="profile-user" class="rounded-circle"></a>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="{{ route('setting') }}"><i data-feather="settings" class="align-self-center icon-xs icon-dual mr-1"></i> Settings</a>
            <div class="dropdown-divider mb-0"></div>
            <a class="dropdown-item" href="{{ route('logout') }}"><i data-feather="power" class="align-self-center icon-xs icon-dual mr-1"></i> Logout</a></div>
        </li>
      </ul>
      <ul class="list-unstyled topbar-nav mb-0">
        <li>
          <button class="nav-link button-menu-mobile"><i data-feather="menu" class="align-self-center topbar-icon"></i></button>
        </li>

      </ul>
    </nav>
  </div>
  <div class="page-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <div class="page-title-box">
            <div class="row">
              @include('layouts.breadcrumb')
            </div>
          </div>
        </div>
      </div>
    </div>
    @yield('content')
    <footer class="footer text-center text-sm-left">&copy; {{ date('Y') }} New Task <span class="d-none d-sm-inline-block float-right"><i class="mdi mdi-heart text-danger"></i> Abdelqader Osama</span>
    </footer>
  </div>
</div>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/metismenu.min.js')}}"></script>
<script src="{{asset('js/waves.js')}}"></script>
<script src="{{asset('js/feather.min.js')}}"></script>
<script src="{{asset('js/simplebar.min.js')}}"></script>
<script src="{{asset('js/jquery-ui.min.js')}}"></script>
<script src="{{asset('js/moment.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
@yield('script')
</body>
</html>




