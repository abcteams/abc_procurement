@extends('layouts.login')

@section('content')
    <div class="login-container lightmode">
    <div class="login-box animated fadeInDown">
        <!-- div class="login-logo" -->
        <div class="login-body">
            <div style="padding:20px">
                <div style="color:#ffffff;font-size:30px;font-family: 'Times New Roman', Times, serif;text-align: center">PROCUREMENT</div>
                <div style="color:#f1f4ec;text-align: center;margin-top:-5px;font-size:12px">Procurement System</div>
            </div>
            <div class="login-title"><strong>Log In</strong> to your account</div>
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
            <div class="form-group">
                <div class="col-md-12">
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <input id="password" type="password" placeholder="Password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6">
                    <a class="btn btn-link btn-block" href="#">
                        Forgot Your Password?
                    </a>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-info btn-block">
                        Login
                    </button>
                </div>
            </div>
            </form>
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <div class="checkbox">

                    </div>
                </div>
            </div>
            <div class="login-subtitle">
                <div style="color: white" >Are you a supplier or a subcontractor ? <a href="{{asset('register')}}">Request an account</a> </div>
            </div>
        </div>
        <div class="login-footer">
            <div class="pull-left">
                &copy; 2017 Hit
            </div>
            <div class="pull-right">
                <a href="#">About</a> |
                <a href="#">Privacy</a> |
                <a href="#">Contact Us</a>
            </div>
        </div>
    </div>
    </div>
@endsection