<h2>
    <span class="pull-right" style="font-size:20px;">
        <span class="label label-primary"><i class="fa fa-bitcoin"></i> 
        @lang('user/dashboard.buy_bitcoin') :  
        {{ btc_buy_price() }} / @lang('user/dashboard.sell_bitcoin') : {{ btc_sell_price() }}
    </span></span></h2>
 <!-- begin #content -->
 <div id="content" class="content">
    <!-- begin row -->
    <div class="row">
        <!-- begin col-3 -->
        <div class="col-md-3 col-sm-6">
            <div class="widget widget-stats bg-blue-grey">
                <div class="stats-icon stats-icon-lg"><i class="material-icons">people</i></div>
                <div class="stats-title">@lang('user/dashboard.today_stat')</div>
                <div class="stats-number">7,842,900</div>
                <div class="stats-progress progress">
                    <div class="progress-bar" style="width: 70.1%;"></div>
                </div>
                <div class="stats-desc">Better than last week (70.1%)</div>
            </div>
        </div>
        
        

        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-md-3 col-sm-6">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon stats-icon-lg"><i class="material-icons">attach_money</i></div>
                <div class="stats-title">@lang('user/dashboard.current_balance')</div>
                <div class="stats-number">{{ get_user_balance_usd(Auth::user()->id) }}</div>
                <div class="stats-progress progress">
                    <div class="progress-bar" style="width: 40.5%;"></div>
                </div>
                <div class="stats-desc">Better than last week (40.5%)</div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-md-3 col-sm-6">
            <div class="widget widget-stats bg-cyan">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-bitcoin"></i></div>
                <div class="stats-title">@lang('user/dashboard.current_balance')</div>
                <div class="stats-number">{{ get_user_balance_btc(Auth::user()->id) }}</div>
                <div class="stats-progress progress">
                    <div class="progress-bar" style="width: 76.3%;"></div>
                </div>
                <div class="stats-desc">Better than last week (76.3%)</div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-md-3 col-sm-6">
            <div class="widget widget-stats bg-deep-purple">
                <div class="stats-icon stats-icon-lg"><i class="material-icons">cached</i></div>
                <div class="stats-title">@lang('user/dashboard.pending_balance')</div>
                <div class="stats-number">{{ get_user_pending_balance_btc(Auth::user()->id) }}</div>
                <div class="stats-progress progress">
                    <div class="progress-bar" style="width: 54.9%;"></div>
                </div>
                <div class="stats-desc">Better than last week (54.9%)</div>
            </div>
        </div>
        <!-- end col-3 -->
    </div>
</div>
    <!-- end row -->

 