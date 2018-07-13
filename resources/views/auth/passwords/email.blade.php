@extends('layouts.auth')

@section('content')
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Reset password</p>
                <div class="panel-body">

                  @if (session('status'))
                      <div class="alert alert-success">
                          {{ session('status') }}
                      </div>
                  @endif

                    <form role="form"
                          method="POST"
                          action="{{ url('password/email') }}">
                        <input type="hidden"
                               name="_token"
                               value="{{ csrf_token() }}">

                               <div class="form-group has-feedback">
                                 <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Email">
                                 @if ($errors->has('email'))
                                 <span class="fa fa-envelope form-control-feedback">{{ $errors->first('email') }}</span>
                                 @endif
                               </div>

                               <div class="col-4">
                                 <button type="submit" class="btn btn-primary btn-block btn-flat">
                                    Reset
                                </button>
                            </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
