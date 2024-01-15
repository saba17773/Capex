@extends('auth.main_template')

@section('content')
<div class="container">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name - Lastname :') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="off" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="users" class="col-md-4 col-form-label text-md-right">{{ __('Username :') }}</label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="off">

                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address :') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row" style="display: none;">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password :') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="off" value="12345678">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row" style="display: none;">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password :') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="off" value="12345678">
                                </div>
                            </div>

                            <div class="form-group row" style="display: none;">
                                <label for="email_appr1" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Approved 1 :') }}</label>

                                <div class="col-md-6">
                                    <input id="email_appr1" type="email" class="form-control @error('email_appr1') is-invalid @enderror" name="email_appr1" value="noreply@deestone.com" required autocomplete="off">

                                    @error('email_appr1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row" style="display: none;">
                                <label for="email_appr2" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Approved 2 :') }}</label>

                                <div class="col-md-6">
                                    <input id="email_appr2" type="email" class="form-control @error('email_appr2') is-invalid @enderror" name="email_appr2" value="noreply@deestone.com" required autocomplete="off">

                                    @error('email_appr2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role :') }}</label>

                                <div class="col-md-6">
                                    
                                    <select id="role" class="form-control select2" style="width: 100%;" @error('role') is-invalid @enderror name="role" required>
                                        {{-- <option value="1">Admin</option>
                                        <option value="2">Admin IT</option> --}}
                                        <option value="3">Key User</option>
                                        {{-- <option value="0">User</option> --}}
                                    </select>
                                    @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div></br></br></br>
@endsection
