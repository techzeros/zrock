@extends('layouts.auth')
    
    @section('title', 'Log In')

    @section('custom_styles')
        <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
        <link href="{{ asset('portal/plugins/parsley/src/parsley.css') }}" rel="stylesheet" />
        <!-- ================== END PAGE LEVEL STYLE ================== -->
    @endsection

    @section('auth-news-feed')
        <!-- begin login -->
        <div class="login login-with-news-feed">
    @endsection

    @section('content')
                <!-- begin login-header -->
                <div class="login-header">
                    <div class="brand">
                        <span class="logo"></span> Login
                        <small>provide valid email and password</small>
                    </div>
                    <div class="icon">
                        <i class="material-icons">lock</i>
                    </div>
                </div>
                <!-- end login-header -->

                <!-- begin login-content -->
                <div class="login-content">

                    @if (\Session::has('message'))
                        <div class="alert alert-success fade in m-b-15">
                            <strong>Message!</strong>
                             <strong>{{ session('message') }}</strong>
                            <span class="close" data-dismiss="alert">×</span>
                        </div>
                    @endif
                    
                    <form data-parsley-validate="true" class="margin-bottom-0" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="form-group m-b-15{{ $errors->has('email') ? ' has-error has-feedback' : '' }}">
                            <input type="email" class="form-control input-lg" name="email" placeholder="Email Address" value="{{ old('email') }}" data-type="email" data-parsley-required="true" />
                            @if ($errors->has('email'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group m-b-15{{ $errors->has('password') ? ' has-error has-feedback' : '' }}">
                            <input type="password" class="form-control input-lg" name="password" placeholder="Password" data-parsley-required="true" />
                            @if ($errors->has('password'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="checkbox m-b-30">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} > Remember Me
                                </label>
                            </div>
                        </div>
                        <div class="register-buttons">
                            <button type="submit" class="btn btn-info btn-block btn-lg">Login</button>
                        </div>
                        <br />
                        <div>
                            <a href="{{ route('password.request') }}" class="btn btn-white btn-block">Forgot Your Password?</a>
                        </div>
    
                        <div class="m-t-20 m-b-40 p-b-40 text-inverse">
                            Don't have an Account? Click <a href="{{ route('register') }}">here</a> to register.
                        </div>
                        <hr />
                        <p class="text-center">
                            &copy; {{ date('Y') }} {{ config('app.name', 'NanoCoins') }} | All Right Reserved.
                        </p>
                    </form>
                </div>
                <!-- end login-content -->
    @endsection

    @section('custom_js')
        <!-- ================== BEGIN PAGE LEVEL JS ================== -->
        <script src="{{ asset('portal/plugins/parsley/dist/parsley.js') }}"></script>
        <!-- ================== END PAGE LEVEL JS ================== -->
    @endsection
