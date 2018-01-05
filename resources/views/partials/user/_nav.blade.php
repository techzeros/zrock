        <!-- begin #sidebar -->
		<div id="sidebar" class="sidebar">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="true" data-height="100%">
				<!-- begin sidebar user -->
				<ul class="nav">
					<li class="nav-profile">
						<div class="image">
							<img src="{{ asset('portal/img/user.jpg') }}" alt="" />
						</div>
						<div class="info">
							{{ Auth::user()->name }} <br />
							<small>{{ Auth::user()->email }}</small>
						</div>
					</li>
				</ul>


				<!-- end sidebar user -->
				<!-- begin sidebar nav -->
				<ul class="nav">
					<li><a href="{{ url('app/dashboard') }}"><i class="material-icons">home</i> <span>@lang('user/dashboard.menu_home')</span></a></li>
					<li><a href="{{ url('app/wallet') }}"><i class="material-icons">credit_card</i> <span>@lang('user/dashboard.my_wallet')</span></a></li>
					<li><a href="#"><i class="material-icons">assignment_returned</i> <span>@lang('user/dashboard.menu_deposit')</span></a></li>
					<li><a href="#"><i class="material-icons">send</i> <span>@lang('user/dashboard.menu_withdraw')</span></a></li>
					<li><a href="#"><i class="material-icons">history</i> <span>@lang('user/dashboard.menu_history')</span></a></li>
					<li><a href="#"><i class="material-icons">swap_horiz</i> <span>@lang('user/dashboard.transfer_bitcoins')</span></a></li>
					<li><a href="#"><i class="material-icons">undo</i> <span>@lang('user/dashboard.request_bitcoins')</span></a></li>
					<li><a href="#"><i class="material-icons">trending_up</i> <span>@lang('user/dashboard.menu_promotion')</span></a></li>
					<li class="divider"></li>
					<li><a href="#"><i class="material-icons">settings</i> <span>@lang('user/dashboard.menu_settings')</span></a></li>
					<li><a href="#"><i class="material-icons">help</i> <span>Help &amp; @lang('user/dashboard.menu_help')</span></a></li>
					<li>
						@component('components.user.logout')
							<i class="material-icons">lock</i> <span>@lang('user/dashboard.menu_logout')</span>
						@endcomponent
					</li>
					
			        <!-- begin sidebar minify button -->
					<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
			        <!-- end sidebar minify button -->
				</ul>
				<!-- end sidebar nav -->
			</div>
			<!-- end sidebar scrollbar -->
		</div>
		<div class="sidebar-bg"></div>
		<!-- end #sidebar -->