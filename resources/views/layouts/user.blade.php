@include('partials.user._head')

    @include('partials.user._begin-container')
	
    @include('partials.user._topnav')
            
    @include('partials.user._nav')

    @include('partials.user._alerts')

    @yield('content')

    @include('partials.user._end-container')

@include('partials.user._footer')
