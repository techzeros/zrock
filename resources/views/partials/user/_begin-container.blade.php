    {{--  begin #page-container  --}}
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed page-with-wide-sidebar">
		{{--  begin #header  --}}
		<div id="header" class="header navbar navbar-default navbar-fixed-top">
			{{--  begin container-fluid  --}}
			<div class="container-fluid">
				{{--  begin mobile sidebar expand / collapse button  --}}
				<div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed navbar-toggle-left" data-click="sidebar-minify">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
					<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="{{ route('user.dashboard') }}" class="navbar-brand">
					    {{ config('app.name', 'NanoCoins') }}
					</a>
				</div>
				{{--  end mobile sidebar expand / collapse button  --}}