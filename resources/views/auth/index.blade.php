@extends('layouts.login')
@section('content')

    <div class="login-box" style="border: 1px solid #d2d6de;">
        <div class="login-logo">
            <a href=""> <b>@yield('title') : DPC</b></a>
        </div><!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form action="@yield('form-action')" method="post">
                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                <div class="form-group has-feedback">
                    <input name="email" type="email" value="{{ old('email') }}" class="form-control" placeholder="Email">

                    @if ($errors->has('email'))
                        <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif

                </div>
                <div class="form-group has-feedback">
                    <input name="password" type="password" class="form-control" placeholder="Password">


                    @if ($errors->has('password'))
                        <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif

                </div>

                <div class="row">
<!--                    <div class=" col-xs-6">-->
<!--<!--                        <a  class="btn btn-primary btn-block btn-flat"  href="@yield('password')">Forgotten password?</a>-->
<!--                    </div><!-- /.col -->

                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat" >Sign In</button>
                    </div><!-- /.col -->
                </div>
            </form>
        </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
@endsection





