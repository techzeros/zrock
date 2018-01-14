@extends('layouts.user')

@section('title', __('user/dashboard.request_bitcoins') )



@section('content') 

        <!-- begin breadcrumb -->
        <ol class="breadcrumb pull-right">
            <li><a href="javascript:;">Home</a></li>
            <li><a href="javascript:;">Form Stuff</a></li>
            <li class="active">Wizards</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">@lang('user/dashboard.request_bitcoins') </h1>
           <h3> <small> @lang('user/dashboard.request_bitcoins_info')</small></h3>
        <!-- end page-header -->
        
        <!-- begin row -->
        <div class="row">
            <!-- begin col-12 -->
            <div class="col-md-12">
                <!-- begin panel -->
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                        </div>
                        <h4 class="panel-title">@lang('user/dashboard.request_bitcoins')</h4>
                      <!-- nanoalertbox("nanoalertbox") here -->

                    </div>
                    <div class="panel-body">
                    
<form action="{{ url('app/request-bitcoins') }}" method="POST">
        <div class="form-group">
            <label>@lang('user/dashboard.select_wallet_address')</label>
            <select class="form-control" name="waddress">


                @if($userAddresses->count() > 0) 
                   <option>@lang('user/dashboard.select_wallet_address')</option>
                    @foreach($userAddresses as $addr) 
                        
                    @php
                    $user_name = camel_case(Auth::user()->name);
                    $exp = 'usr_'.$user_name.'_';
                    $expl = explode($exp,$addr->label);
                    @endphp

                    <option value="
                    {{ old('waddress') == $addr->address ? 'selected' : $addr->address }}">
                    @lang('user/dashboard.label')
                        
                         {{ $expl[1] }}   -
                         @lang('user/dashboard.address'): 
                         {{$addr->address}} ({{ $addr->available_balance }} BTC)</option>
                         
                         @endforeach
                         @else 
                     <option>@lang('user/dashboard.info_3')</option>
                    
                     @endif
                  
            
            </select>
            <small>@lang('user/dashboard.address_to_receive')</small>
        </div>
        <div class="form-group">
            <label>@lang('user/dashboard.email')</label>
            <div class="input-group">
            <span class="input-group-addon">@</span>
            <input type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="@lang('user/dashboard.email')">
            </div>
            <small>@lang('user/dashboard.requested_email_info')</small>
        </div>
        <div class="form-group">
            <label>@lang('user/dashboard.amount')</label>
            <div class="input-group">
              <input type="text" class="form-control" name="amount" value="{{ old('amount') }}" placeholder="0.0000000">
              <span class="input-group-addon" id="basic-addon2">BTC</span>
            </div>
        </div>
        <div class="form-group">
            <label>@lang('user/dashboard.note')</label>
            <textarea class="form-control" name="note" value="{{ old('note') }}" rows="2"></textarea>
            <small>@lang('user/dashboard.note_info') </small>
        </div>
        <button type="submit" class="btn btn-sm btn-primary m-r-5" name="btc_send_request">@lang('user/dashboard.btn_12')</button>
    </form>

                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-12 -->
            </div>
            <!-- end row -->

@endsection