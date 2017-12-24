                {{--  begin header navigation right  --}}
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown navbar-user">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
							<img src="{{ asset('portal/img/user.jpg') }}" alt="" /> 
							<span class="hidden-xs">Hi, {{ Auth::guard('admin')->user()->name }}</span>
						</a>
						<ul class="dropdown-menu animated fadeInLeft">
							<li class="arrow"></li>
							<li><a href="javascript:;">Settings</a></li>
							<li><a href="javascript:;">Deposit</a></li>
                            <li><a href="javascript:;">Withdraw</a></li>
                            <li><a href="javascript:;">Transactions</a></li>
							<li class="divider"></li>
                            <li>
                                @component('components.admin.logout')
                                    Logout
                                @endcomponent
                            </li>
						</ul>
					</li>
				</ul>
                {{--  end header navigation right  --}}
            </div>
			{{--  end container-fluid  --}}
		</div>
		{{--  end #header  --}}