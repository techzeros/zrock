@extends('layouts.auth')
    
    @section('title', 'Admin Reset Password')

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
                        <small>Admin Reset Password. Provide valid email</small>
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
                            <span class="close" data-dismiss="alert">×</span>
                        </div>
                    @endif
                    
                    <form data-parsley-validate="true" class="margin-bottom-0" method="POST" action="{{ route('admin.password.email') }}">
                        
                        {{ csrf_field() }}

                        <div class="form-group m-b-15{{ $errors->has('email') ? ' has-error has-feedback' : '' }}">
                            <input type="email" class="form-control input-lg" name="email" placeholder="Email Address" value="{{ old('email') }}" data-type="email" data-parsley-required="true" />
                            @if ($errors->has('email'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                                                
                        <div class="register-buttons">
                            <button type="submit" class="btn btn-info btn-block btn-lg">Send Password Reset Link</button>
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
