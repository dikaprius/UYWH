@extends('layouts.main')
@section('content')


<div class="card bg-light">
  <article class="card-body mx-auto" style="max-width: 400px;">
  <h4 class="card-title mt-3 text-center">Create Account</h4>
  <p class="text-center">Get started with your free account</p>
  <p>
    <a href="{{ url('/linkedin-redirect') }}" class="btn btn-block btn-linkedin"> <i class="fa fa-linkedin"></i>   Login via Linkedin</a>
    <a href="{{ url('/redirect') }}" class="btn btn-block btn-facebook"> <i class="fa fa-facebook-f"></i>   Login via facebook</a>
  </p>
    <p class="divider-text">
        <span class="bg-light">OR</span>
    </p>
      <form action="{{ url('/register') }}" enctype="multipart/form-data" method="post">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="form-group input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
          </div>
            <input name="reg_name" class="form-control" placeholder="Full name" type="text" >
        </div> <!-- form-group// -->

        <div class="form-group input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
         </div>
            <input name="email_registration" class="form-control" placeholder="Email address" type="email" >
        </div> <!-- form-group// -->

        <div class="form-group input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
          </div>
          <select class="custom-select" style="max-width: 120px;">
              <option selected="">+62</option>
              <option value="1">+972</option>
              <option value="2">+198</option>
              <option value="3">+701</option>
          </select>
          <input name="phone_number" maxlength="12" class="form-control" placeholder="Phone number" type="text" >
        </div> <!-- form-group// -->

        <div class="form-group input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-calendar"></i> </span>
          </div>
            <input name="birthdate" class="form-control" placeholder="Your birthdate" type="date" max="2014-12-31" min="1800-12-31" >
        </div> <!-- form-group end.// -->

        <div class="form-group input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
          </div>
            <input name="reg_password" class="form-control" placeholder="Create password" type="password" >
        </div> <!-- form-group// -->

        <div class="form-group input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
          </div>
            <input name="reg_password_confirmation" class="form-control" placeholder="Repeat password" type="password" >
        </div> <!-- form-group// -->

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block"> Create Account  </button>
        </div> <!-- form-group// -->
        <p class="text-center">Have an account? <a href="{{ url('/login') }}">Log In</a> </p>
      </form>
  </article>
</div> <!-- card.// -->



@endsection
