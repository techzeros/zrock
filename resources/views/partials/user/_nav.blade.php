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
					<li><a href="#"><i class="material-icons">home</i> <span>Home</span></a></li>
					<li><a href="#"><i class="material-icons">credit_card</i> <span>Wallets</span></a></li>
					<li><a href="#"><i class="material-icons">assignment_returned</i> <span>Deposit</span></a></li>
					<li><a href="#"><i class="material-icons">send</i> <span>Withdraw</span></a></li>
					<li><a href="#"><i class="material-icons">history</i> <span>Transactions</span></a></li>
					<li><a href="#"><i class="material-icons">swap_horiz</i> <span>NairaBitrade</span></a></li>
					<li><a href="#"><i class="material-icons">trending_up</i> <span>Promotion</span></a></li>
					<li class="divider"></li>
					<li><a href="#"><i class="material-icons">settings</i> <span>Settings</span></a></li>
					<li><a href="#"><i class="material-icons">help</i> <span>Help &amp; Feedback</span></a></li>
					<li>
						@component('components.user.logout')
							<i class="material-icons">lock</i> <span>Logout</span>
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