@auth('admin')

@include('partials.admin._head')

    @include('partials.admin._begin-container')
	
    @include('partials.admin._topnav')
            
    @include('partials.admin._nav')

    @include('partials.admin._alerts')

    @yield('content')

    @include('partials.admin._end-container')

@include('partials.admin._footer')

@endauth

@auth
    {{ 'This is a dead end.' }}
@endauth