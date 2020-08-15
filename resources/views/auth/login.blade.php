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
                <li class="nav-item"><a class="nav-link active font-weight-semibold" data-toggle="tab" href="#LogIn_Tab" role="tab">Log In</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active p-3 pt-3" id="LogIn_Tab" role="tabpanel">
                  <form class="form-horizontal auth-form my-4" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                      <label for="email">Email</label>
                      <div class="input-group mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Enter username"
                               value="{{ old('email') }}" required autocomplete="email" autofocus/></div>
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

                    <div class="form-group">
                      <label for="userpassword">Password</label>
                      <div class="input-group mb-3">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                               id="userpassword" placeholder="Enter password" required autocomplete="current-password"/>
                      </div>
                    </div>

                    @error('Password')
                    <div class="form-group">
                      <div class="input-group mb-3">
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      </div>
                    </div>
                    @enderror

                    <div class="form-group row mt-4">
                      <div class="col-sm-6">
                        <div class="custom-control custom-switch switch-success">
                          <input type="checkbox" name="remember" class="custom-control-input" {{ old('remember') ? 'checked' : '' }}id="customSwitchSuccess">
                          <label class="custom-control-label text-muted" for="customSwitchSuccess">Remember me</label></div>
                      </div>
                      <div class="col-sm-6 text-right"><a href="{{ route('password.request') }}" class="text-muted font-13"><i class="dripicons-lock"></i> Forgot password?</a>
                      </div>
                    </div>
                    <div class="form-group mb-0 row">
                      <div class="col-12 mt-2">
                        <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log In <i class="fas fa-sign-in-alt ml-1"></i></button>
                      </div>
                    </div>
                  </form>
                  <div class="m-3 text-center text-muted"><p class="">Don't have an account ? <a href="{{ route('register') }}" class="text-primary ml-2">Free Resister</a></p>
                  </div>
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
