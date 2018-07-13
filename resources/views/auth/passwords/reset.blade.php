@extends('layouts.auth')

@section('content')
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Reset Password</p>

                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were problems with input:
                            <br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="form-horizontal"
                          role="form"
                          method="POST"
                          action="{{ url('password/reset') }}">
                        <input type="hidden"
                               name="_token"
                               value="{{ csrf_token() }}">
                        <input type="hidden" name="token" value="{{ $token }}">

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

                        <div class="col-4">
                          <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
