@extends('layouts.user')

@section('title', __('user/dashboard.request_bitcoins') )



@section('content')
@php
 $process_time_to_buy = Setting::get('process_time_to_buy', '1')
 @endphp

<h2><small>
        @lang('user/dashboard.buy_bitcoins')
    </small> 
</h2>

<h3><small>@lang('user/dashboard.buy_bitcoins_info')  
        @if($process_time_to_buy == "1")
          @lang('user/dashboard.1_hour')  
          @else 
          {{ $process_time_to_buy }} @lang('user/dashboard.hours') </small></h3>
          @endif




@endsection