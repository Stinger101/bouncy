@extends('layouts.auth')

@section('content')
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form method="POST" action="{{ route('register') }}">
      {{ csrf_field() }}

        <div class="form-group has-feedback">
          <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus placeholder="Full name">
          @if ($errors->has('name'))
          <span class="fa fa-user form-control-feedback">{{ $errors->first('name') }}</span>
          @endif
        </div>
        <div class="form-group has-feedback">
          <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Email">
          @if ($errors->has('email'))
          <span class="fa fa-envelope form-control-feedback">{{ $errors->first('email') }}</span>
          @endif
        </div>
        <div class="form-group has-feedback">
          <input id="password" type="password" class="form-control" name="password" required placeholder="Password">
          @if ($errors->has('password'))
          <span class="fa fa-lock form-control-feedback">{{ $errors->first('password') }}</span>
          @endif
        </div>
        <div class="form-group has-feedback">
          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Retype password">
          <!-- <span class="fa fa-lock form-control-feedback"></span> -->
        </div>
        <div class="row">
          <div class="col-8">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox"> I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fa fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fa fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div> -->

      <a href="{{url('/login')}}" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->
@endsection
