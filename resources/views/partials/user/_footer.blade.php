    <!-- ================== BEGIN BASE JS ================== -->
	<script src="{{ asset('portal/plugins/jquery/jquery-1.9.1.min.js') }}"></script>
	<script src="{{ asset('portal/plugins/jquery/jquery-migrate-1.1.0.min.js') }}"></script>
	<script src="{{ asset('portal/plugins/jquery-ui/ui/minified/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('portal/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
	<!--[if lt IE 9]>
		<script src="{{ asset('portal/crossbrowserjs/html5shiv.js') }}"></script>
		<script src="{{ asset('portal/crossbrowserjs/respond.min.js') }}"></script>
		<script src="{{ asset('portal/crossbrowserjs/excanvas.min.js') }}"></script>
	<![endif]-->
	<script src="{{ asset('portal/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
	<script src="{{ asset('portal/plugins/jquery-cookie/jquery.cookie.js') }}"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="{{ asset('portal/plugins/morris/raphael.min.js') }}"></script>
    <script src="{{ asset('portal/plugins/morris/morris.js') }}"></script>
    <script src="{{ asset('portal/plugins/jquery-jvectormap/jquery-jvectormap.min.js') }}"></script>
    <script src="{{ asset('portal/plugins/jquery-jvectormap/jquery-jvectormap-world-merc-en.js') }}"></script>
    <script src="{{ asset('portal/plugins/bootstrap-calendar/js/bootstrap_calendar.min.js') }}"></script>
	<script src="{{ asset('portal/plugins/gritter/js/jquery.gritter.js') }}"></script>
	<script src="{{ asset('portal/js/dashboard-v2.min.js') }}"></script>
	<script src="{{ asset('portal/js/apps.min.js') }}"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->


	<!-- ================== BEGIN NANOCOIN JS FUNCTION ================== -->
	<script src="{{ asset('js/nanofunctions.js') }}"></script>
	<!-- ================== END NANOCOIN JS FUNCTION ================== -->

    {{--  User Defined JS Scripts  --}}
   
	
	<script>
			@yield('custom_js')


		$(document).ready(function() {
			NanoApp.init();
			DashboardV2.init();
		});
	</script>
</body>
</html>
