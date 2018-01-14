@auth

@include('partials.user._head')

    @include('partials.user._begin-container')
	
    @include('partials.user._topnav')
            
    @include('partials.user._nav')

    @include('partials.user._stats')

            <!-- begin #content -->
	<div id="content" class="content">
    @include('partials.user._alerts')
    @yield('content')
	</div>
		<!-- end #content -->
    @include('partials.user._end-container')

@include('partials.user._footer')

@endauth

@auth('admin')
    {{ 'This is a dead end' }}
@endauth