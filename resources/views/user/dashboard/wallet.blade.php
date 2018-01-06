@extends('layouts.user')

@section('title', 'Wallet')

@section('content')

@php 
$userid = Auth::user()->id;
@endphp


{{ $userid }}
			 <!-- begin #content -->
 <div id="content" class="content">
			<!-- begin row -->

			
				<div class="panel panel-default">
					<div class="panel-body">
					<h2><small>@lang('user/dashboard.addresses'); </small> <span class="pull-right"><small><a href="javascript:void(0);" class="btn btn-default btn-sm" onclick="btc_new_address();"><i class="fa fa-plus"></i> @lang('user/dashboard.btn_5') </a></small></span></h2>
							<table class="table">
								<thead>
									<tr>
										<th>@lang('user/dashboard.label') </th>
										<th>@lang('user/dashboard.address') </th>
										<th>@lang('user/dashboard.balance') </th>
										<th>@lang('user/dashboard.action') </th>
									</tr>
								</thead>
								<tbody id="btc_addresses">
										@if ($Btc_users_address->count() > 0) 
									    @foreach ($Btc_users_address as $query)																		
																		<tr id="btc_address_echo {{ $userid }} ">
																			<td> 
																			@php
																			$exp = 'usr_'.Auth::user()->id.'_';
																			$expl = explode($exp,$query->label);
																			echo $expl[0]															
																			@endphp 
																				
																		   </td>																		</td>
																			<td> {{ $query->address }}   </td>
																			<td> {{ $query->available_balance }}  BTC </td>
																			<td>
																				 <a class="btn btn-circle btn-sm btn-icon btn-default" href="javascript:;" data-toggle="tooltip" data-placement="top" title="@lang('user/dashboard.btn_6') " onclick="btc_send_from_address('echo $row['id') ');"><i class="fa fa-arrow-circle-o-up" style="margin:0px;"></i></a>
																				<a class="btn btn-circle btn-sm btn-icon btn-default" href="javascript:;" data-toggle="tooltip" data-placement="top" title="@lang('user/dashboard.btn_7') " onclick="btc_receive_to_address('echo $row['id') ');"><i class="fa fa-arrow-circle-o-down" style="margin:0px;"></i></a> 
																				<a class="btn btn-circle btn-sm btn-icon btn-default" href="javascript:;" data-toggle="tooltip" data-placement="top" title="@lang('user/dashboard.btn_9') " onclick="btc_archive_address('echo $row['id') ');"><i class="fa fa-archive" style="margin:0px;"></i></a>
																				<a class="btn btn-circle btn-sm btn-icon btn-default" data-toggle="tooltip" data-placement="top" title="@lang('user/dashboard.btn_10') " href="echo $settings['url') account/transactions_by_address/echo $row['address') "><i class="fa fa-bars" style="margin:0px;"></i></a> 
																			</td>
																		</tr>
																	
																	
								@endforeach
								@else
								<tr><td colspan="4">

										<div class="alert alert-warning">
												@lang('user/dashboard.info_2') 
											</div>
										
								</td></tr> 
								@endif
								</tbody>
							</table>
					</div>
				</div>
				
				<div class="panel panel-default">
					<div class="panel-body">
					<h2><small>@lang('user/dashboard.latest_transactions') </small></h2>
							<div class="timeline">
															
								
									@if ($Btc_users_transaction->count() > 0) 
									@foreach ($Btc_users_transaction as $query)	
																	
														
																	
																}
															} 
															@endforeach
															@else
															@lang('user/dashboard.info_6') 
															@endif
															
															
														</div>
					</div>
				</div>
			<!-- end row -->
		</div>
		<!-- end #content -->
@endsection