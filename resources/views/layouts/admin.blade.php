@include('admin.partials._head')

    @include('admin.partials._begin-container')
	
    @include('admin.partials._topnav')
            
    @include('admin.partials._nav')

    @include('admin.partials._alerts')

    @yield('content')

    @include('admin.partials._end-container')

@include('admin.partials._footer')
