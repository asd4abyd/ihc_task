@extends('layouts.auth')

@section('content')
  <div class="row vh-100 d-flex justify-content-center">
    <div class="col-12 align-self-center">
      <div class="row">
        <div class="col-lg-5 mx-auto">
          <div class="card">
            <div class="card-body p-0 auth-header-box">
              <div class="text-center p-3">
                <a href="{{ url('/') }}" class="logo logo-admin">
                  <img src="{{asset('images/logo2-150x150.png')}}" height="50" alt="logo" class="auth-logo">
                </a>
                <h4 class="mt-3 mb-1 font-weight-semibold text-white font-18">My Task</h4>
              </div>
            </div>
            <div class="card-body">
              <ul class="nav-border nav nav-pills" role="tablist">
                <li class="nav-item"><a class="nav-link active font-weight-semibold" data-toggle="tab" href="#Register_Tab" role="tab">Register</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active px-3 pt-3" id="Register_Tab" role="tabpanel">
                  <form class="form-horizontal auth-form my-4" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group"><label for="name">Name</label>
                      <div class="input-group mb-3">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name"
                               autofocus placeholder="Enter your name"></div>
                    </div>
                    <div class="form-group"><label for="useremail">Email</label>
                      <div class="input-group mb-3">
                        <input id="useremail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required
                               autocomplete="email" placeholder="Enter Email"></div>
                    </div>
                    @error('email')
                    <div class="form-group">
                      <div class="input-group mb-3">
      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      </div>
                    </div>
                    @enderror
                    <div class="form-group"><label for="userpassword">Password</label>
                      <div class="input-group mb-3">
                        <input id="userpassword" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter password" required
                               autocomplete="new-password"></div>
                    </div>
                    @error('password')
                    <div class="form-group">
                      <div class="input-group mb-3">
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      </div>
                    </div>
                    @enderror
                    <div class="form-group"><label for="conf_password">Confirm Password</label>
                      <div class="input-group mb-3">
                        <input id="conf_password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"
                               placeholder="Enter Confirm Password"></div>
                    </div>

                    <div class="form-group mb-0 row">
                      <div class="col-12 mt-2">
                        <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Register <i class="fas fa-sign-in-alt ml-1"></i></button>
                      </div>
                    </div>
                  </form>
                  <div class="m-3 text-center text-muted"><p class="">Do you have an account ? <a href="{{ route('login') }}" class="text-primary ml-2">Login</a></p></div>
                </div>
              </div>
            </div>
            <div class="card-body bg-light-alt text-center"><span class="text-muted d-none d-sm-inline-block">Abdelqader osama © {{ date('Y') }}</span></div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
