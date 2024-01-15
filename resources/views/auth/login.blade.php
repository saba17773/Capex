@extends('auth.main_template')
  @section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-4">
      </div>
      <div class="col-7">
        <div class="login-box">
          <!-- /.login-logo -->
          <div class="card card-outline card-warning">
            <div class="card-header text-center">
                <a class="nav-link" href="{{ route('login') }}">
                    <img class="" src="{{ asset('adminlte/dist/img/app-logo.png') }}" alt="AdminLTELogo" height="70" width="auto">
                </a>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>    
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    <p class="login-box-msg">Sign in to start your session</p>
                    <div class="input-group col-5">
                        <label>Username :</label>
                    </div>
                    <div class="input-group mb-3">
                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="off" autofocus>
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-users"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group col-4">
                        <label>Password :</label>
                    </div>
                    <div class="input-group mb-3">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                                </div>
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-5">
                          <div class="icheck-primary">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember">
                                {{ __('Remember Me') }}
                            </label>
                          </div>
                        </div>
                        <!-- /.col -->
                        {{-- <div class="col-7">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div> --}}
                        <!-- /.col -->
                    </div>
                    <div class="social-auth-links text-center mt-2 mb-3">
                        <button id="btnlogin" type="submit" class="btn btn-block btn-warning">
                        <i class="fas fa-arrow-circle-right"></i> {{ __('Login') }} 
                        </button>
                        
                        {{-- <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                        </a> --}}
                    </div>
                    <p class="mb-0">
                        {{-- <a href="" class="text-right"><B>Login with LDAP</B></a> --}}
                    </p>
                </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
  </div>
  @endsection