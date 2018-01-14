@extends('layouts.user')

@section('title', 'Dashboard')

@section('content')

			
			<!-- begin row -->
			<div class="row">
			    <div class="col-md-8">
			        <div class="widget-chart with-sidebar bg-grey-900">
			            <div class="widget-chart-content">
			                <h4 class="chart-title">
			                    Bitcoin Market Price (USD) Analytics
			                    <small>Average USD market price across major bitcoin exchanges.</small>
			                </h4>
			                <div id="nano-bitcoinmarket-line-chart" class="morris-inverse"  style="height: 260px; width: 600px;"></div>
						</div>
						{{--  
			            <div class="widget-chart-sidebar bg-black">
			                <div class="chart-number">
			                    1,225,729
			                    <small>visitors</small>
			                </div>
			                <div id="visitors-donut-chart" style="height: 160px"></div>
			                <ul class="chart-legend">
			                    <li><i class="fa fa-circle-o fa-fw text-success m-r-5"></i> 34.0% <span>New Visitors</span></li>
			                    <li><i class="fa fa-circle-o fa-fw text-primary m-r-5"></i> 56.0% <span>Return Visitors</span></li>
			                </ul>
			            </div>  --}}
			        </div>
			    </div>
			    <div class="col-md-4">
			        <div class="panel panel-inverse" data-sortable-id="index-1">
			            <div class="panel-heading">
			                <h4 class="panel-title">
			                   Total Bitcoin This Month(USD)
			                </h4>
			            </div>
			            <div id="bitcointotal-donut-chart" class="bg-black" style="height: 295px;"></div>
			             
			        </div>
			    </div>
			</div>
@endsection