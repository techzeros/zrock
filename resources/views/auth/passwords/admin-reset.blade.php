@extends('layouts.auth')
    
    @section('title', 'Reset Password')

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
                        <span class="logo"></span>Reset Password
                        <small>Change Your Admin Password.</small>
                    </div>
                    <div class="icon">
                        <i class="material-icons">edit</i>
                    </div>
                </div>
                <!-- end login-header -->

                <!-- begin login-content -->
                <div class="login-content">

                    @if (\Session::has('status'))
                        <div class="alert alert-success fade in m-b-15">
                             <strong>{{ session('status') }}</strong>
                        </div>
                    @endif
                    
                    <form data-parsley-validate="true" class="margin-bottom-0" method="POST" action="{{ route('admin.password.request') }}">
                        
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group m-b-15{{ $errors->has('email') ? ' has-error has-feedback' : '' }}">
                            <input type="email" class="form-control input-lg" name="email" placeholder="Email Address" value="{{ $email or old('email') }}" data-type="email" data-parsley-required="true" autofocus />
                            @if ($errors->has('email'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group m-b-15{{ $errors->has('password') ? ' has-error has-feedback' : '' }}">
                            <input type="password" class="form-control input-lg" id="password" name="password" placeholder="Password" data-type="password" data-parsley-required="true" />
                            @if ($errors->has('password'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group m-b-15{{ $errors->has('password_confirmation') ? ' has-error has-feedback' : '' }}">
                            <input type="password" class="form-control input-lg" name="password_confirmation" placeholder="Re-enter Password" data-parsley-equalto="#password" data-type="password" data-parsley-required="true" />
                            @if ($errors->has('password_confirmation'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                        </div>
                                                
                        <div class="register-buttons">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">Reset Password</button>
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
