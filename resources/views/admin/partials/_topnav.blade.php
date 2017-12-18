                {{--  begin header navigation right  --}}
				<ul class="nav navbar-nav navbar-right">
				    {{--  <li>
				        <a href="#" class="icon notification waves-effect waves-light" data-toggle="navbar-search"><i class="material-icons">search</i></a>
				    </li>  --}}
					<li class="dropdown">
                        <a href="#" class="icon notification waves-effect waves-light" data-toggle="dropdown">
                            <i class="material-icons">inbox</i> <span class="label label-notification">5</span>
                        </a>
						<ul class="dropdown-menu media-list pull-right animated fadeInDown">
                            <li class="dropdown-header bg-indigo text-white">Notifications (5)</li>
                            <li class="media">
                                <a href="javascript:;">
                                    <div class="media-left"><img src="{{ asset('portal/img/user-1.jpg') }}" class="media-object" alt="" /></div>
                                    <div class="media-body">
                                        <h6 class="media-heading">John Smith</h6>
                                        <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                                        <div class="text-muted f-s-11">25 minutes ago</div>
                                    </div>
                                </a>
                            </li>
                            <li class="media">
                                <a href="javascript:;">
                                    <div class="media-left"><img src="{{ asset('portal/img/user-2.jpg') }}" class="media-object" alt="" /></div>
                                    <div class="media-body">
                                        <h6 class="media-heading">Olivia</h6>
                                        <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                                        <div class="text-muted f-s-11">35 minutes ago</div>
                                    </div>
                                </a>
                            </li>
                            <li class="media">
                                <a href="javascript:;">
                                    <div class="media-left"><i class="material-icons media-object bg-deep-purple">people</i></div>
                                    <div class="media-body">
                                        <h6 class="media-heading"> New User Registered</h6>
                                        <div class="text-muted f-s-11">1 hour ago</div>
                                    </div>
                                </a>
                            </li>
                            <li class="media">
                                <a href="javascript:;">
                                    <div class="media-left"><i class="material-icons media-object bg-blue">email</i></div>
                                    <div class="media-body">
                                        <h6 class="media-heading"> New Email From John</h6>
                                        <div class="text-muted f-s-11">2 hours ago</div>
                                    </div>
                                </a>
                            </li>
                            <li class="media">
                                <a href="javascript:;">
                                    <div class="media-left"><i class="material-icons media-object bg-teal">shopping_basket</i></div>
                                    <div class="media-body">
                                        <h6 class="media-heading">You sold an item!</h6>
                                        <div class="text-muted f-s-11">3 hours ago</div>
                                    </div>
                                </a>
                            </li>
                            <li class="dropdown-footer text-center">
                                <a href="javascript:;">View more</a>
                            </li>
						</ul>
					</li>
					<li class="dropdown navbar-user">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
							<img src="{{ asset('portal/img/user.jpg') }}" alt="" /> 
							<span class="hidden-xs">Hi, John Smith</span>
						</a>
						<ul class="dropdown-menu animated fadeInLeft">
							<li class="arrow"></li>
							<li><a href="javascript:;">Edit Profile</a></li>
							<li><a href="javascript:;"><span class="badge badge-danger pull-right">2</span> Inbox</a></li>
							<li><a href="javascript:;">Calendar</a></li>
							<li><a href="javascript:;">Setting</a></li>
							<li class="divider"></li>
							<li><a href="javascript:;">Log Out</a></li>
						</ul>
					</li>
				</ul>
                {{--  end header navigation right  --}}

                {{--  <div class="search-form">
                    <button class="search-btn" type="submit"><i class="material-icons">search</i></button>
                    <input type="text" class="form-control" placeholder="Search Something...">
                    <a href="#" class="close" data-dismiss="navbar-search"><i class="material-icons">close</i></a>
                </div>  --}}

            </div>
			{{--  end container-fluid  --}}
		</div>
		{{--  end #header  --}}