@extends('layouts.user')

@section('title', 'Wallet')

@section('content')

@php 
$userid = Auth::user()->id;
@endphp

{{ btc_buy_price() }}
{{ idinfo('name') }}
			 <!-- begin #content -->
 <div id="content" class="content">
			<!-- begin row -->

			
				<div class="panel panel-default">
					<div class="panel-body">
					<h2><small>@lang('user/dashboard.addresses'); </small> 
						<span class="pull-right"><small><a href="#modal_new_address" class="btn btn-sm btn-success" data-toggle="modal">
							<i class="fa fa-plus"></i> @lang('user/dashboard.btn_5') </a></small></span></h2>
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
																			$exp = 'usr_'.Auth::user()->name.'_';
																			$expl = explode($exp,$query->label);
																			echo $expl[0]															
																			@endphp 
																				
																		   </td>																		</td>
																			<td> {{ $query->address }}   </td>
																			<td> {{ $query->available_balance }}  BTC </td>
																			<td>
																				<a href="#modal_send_from_address" class="btn btn-circle btn-sm btn-primary" data-toggle="modal" title="@lang('user/dashboard.btn_6')"><i class="fa fa-arrow-circle-o-up" style="margin:0px;"></i></a>
																				<a class="btn btn-circle btn-sm  btn-primary" href="#modal_receive_to_address" data-toggle="modal" title="@lang('user/dashboard.btn_7')" ><i class="fa fa-arrow-circle-o-down" style="margin:0px;"></i></a> 
																				<a class="btn btn-circle btn-sm  btn-primary" href="#btc_archive_address" data-toggle="tooltip" data-placement="top" title="@lang('user/dashboard.btn_9') "><i class="fa fa-archive" style="margin:0px;"></i></a>
																				<a class="btn btn-circle btn-sm  btn-primary" data-toggle="tooltip" data-placement="top" title="@lang('user/dashboard.btn_10') " href="/account/transactions_by_address/{{ $query->address }} "><i class="fa fa-bars" style="margin:0px;"></i></a> 
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
																	
																	 <!-- TIMELINE ITEM -->
																	<div class="timeline-item">
																		<div class="timeline-badge">
																			@if ($query->type == "sent") 
																			<div style="margin-left:20px;margin-top:35px;font-size:16px;" class="text text-danger"><i class="fa fa-arrow-circle-o-up fa-3x"></i></div>
																			 @elseif($query->type == "received") 
																			<div style="margin-left:20px;margin-top:35px;font-size:16px;" class="text text-success"><i class="fa fa-arrow-circle-o-down fa-3x"></i></div>
																			 
																			  
																		</div>
																		<div class="timeline-body">
																			<div class="timeline-body-arrow"> </div>
																			<div class="timeline-body-head">
																				<div class="timeline-body-head-caption">
																					<a href="javascript:void(0);" class="timeline-body-title font-blue-madison">
																						@elseif ($query->type == "sent") 
																						 @lang('user/dashboard.sent')  
																						 @elseif ($query->type == "received") 
																						@lang('user/dashboard.received')  
																						
																						
																						
																						{{ $query->amount }}  BTC</a>
																				</div>
																			<div class="timeline-body-content">
																				<span class="font-grey-cascade"> 
																					@lang('user/dashboard.transaction_id') : 
																					<b><a href="https://chain.so/tx/BTC/{{ $query->txid }}  ">{{ $query->txid }} 
																					 </a></b><br/>
																					@lang('user/dashboard.sender') : <b>{{ $query->sender }}</b><br/>
																					@lang('user/dashboard.recipient') : <b>{{ $query->recipient }} </b><br/>
																					@lang('user/dashboard.confirmations') : <b>{{ $query->confirmations }} </b><br/>
																					@lang('user/dashboard.time') : <b>{{ date("d/m/Y H:i",$query->time ) }} </b>
																				</span>
																			</div>
																		</div>
																	</div>
																	<!-- END TIMELINE ITEM -->
																	
																
															@endif  
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

		<!-- #new address modal-dialog -->
		<div class="modal fade" id="modal_new_address">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> @lang('user/dashboard.new_address')</h4>
					</div>

					<div class="modal-body">

							<div id="html_new_address_results"></div>
							<div id="html_new_address_form"></div>

						<form id="form_new_address">
							<p>@lang('user/dashboard.this_modal_create_address')</p>
							<div class="form-group">
								<label>@lang('user/dashboard.label')</label>
								<input type="text" class="form-control" name="label" placeholder="@lang('user/dashboard.label_info')">
							</div>
							<p>@lang('user/dashboard.label_info_2')</p>
							<button type="button" onclick="btc_submit_new_address();" class="btn btn-primary"><i class="fa fa-plus"></i>@lang('user/dashboard.btn_26')</button>
						</form>
					</div>
					<div class="modal-footer">
						<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
					</div>
				</div>
			</div>
		</div>

				@php
				$total = '0.0000';														
				@endphp 
				@foreach ($Btc_users_address as $query)	
		<!-- #send_from_address modal-dialog -->
		<div class="modal fade" id="modal_send_from_address">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h4 class="modal-title"><i class="fa fa-arrow-circle-o-up"></i> @lang('user/dashboard.send_bitcoins')</h4>
					</div>
					<div class="modal-body">
						<form id="form_new_address">
								<div class="form-group">
							<label>@lang('user/dashboard.from_wallet_address')</label>
							
							<input type="text" class="form-control" disabled value="{{ $expl[0]	}} - {{ $query->address }}">
								<label>@lang('user/dashboard.label')</label>
							</div>


					<div class="form-group">
							<label>@lang('user/dashboard.to_wallet_address')</label>
							<input type="text" class="form-control" name="to_address">
						</div>


					<div class="form-group">
							<label>@lang('user/dashboard.amount')</label>
							<input type="text" class="form-control" name="amount" placeholder="0.000000">
						</div>

						
					<button type="button" class="btn btn-primary">@lang('user/dashboard.btn_6')</button>
					<span class="pull-right">
							@lang('user/dashboard.error_30'): <span id="btc_total">{{ $total }}</span> BTC
					</span>	
				</form>
					</div>
					<div class="modal-footer">
						<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
					</div>
				</div>
			</div>
		</div>
		@endforeach


		@foreach ($Btc_users_address as $query)	
		<!-- #receive_to_address modal-dialog -->
		<div class="modal fade" id="modal_receive_to_address">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h4 class="modal-title"><i class="fa fa-arrow-circle-o-up"></i> @lang('user/dashboard.receive_bitcoins')</h4>
					</div>
					<div class="modal-body">
						<form id="btc_generate_qr_code">
								<div class="form-group">
							<label>@lang('user/dashboard.wallet_address')</label>
							
							<input type="text" class="form-control" disabled value="{{ $query->address }}">
							</div>


					<div class="form-group">
							<label>@lang('user/dashboard.amount')</label>
							<input type="text" class="form-control" name="amount" placeholder="0.000000">
						</div>

						
					<button type="button" class="btn btn-primary">@lang('user/dashboard.btn_27')</button>
					
				</form>

			<div class="col-md-4">
					<center><div id="btc_qr_code"></div></center>
				</div>

					</div>
					<div class="modal-footer">
						<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
					</div>
				</div>
			</div>
		</div>
		@endforeach
@endsection