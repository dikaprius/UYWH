@extends('layouts.main')

@section('content')

<div class="form-login">
  <div class="card-body mx-auto" style="max-width: 440px;">
    <p>
      <a href="{{ url('/linkedin-redirect') }}" class="btn btn-block btn-linkedin"> <i class="fa fa-linkedin"></i>   Login via Linkedin</a>
      <a href="{{ url('/redirect') }}" class="btn btn-block btn-facebook"> <i class="fa fa-facebook-f"></i>   Login via facebook</a>
    </p>
      <p class="divider-text">
          <span class="bg-light">OR</span>
      </p>
  </div>
    <div class="card-body">
        <form  method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group row">
                <label for="email" class="col-sm-5 col-form-label text-md-right">e-mail </label>

                <div class="col-md-3">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-5 col-form-label text-md-right">Password</label>

                <div class="col-md-3">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6 offset-md-5">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-8 text-md-right">
                    <button type="submit" class="btn btn-primary">
                        Login
                    </button>

                    <a class="btn btn-link" href="#">
                      Forgot Your Password ?
                    </a>
                    <h6></h6>
                    <a class="btn btn-link" href="{{ route('register') }}">
                      Sign Up Here
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
