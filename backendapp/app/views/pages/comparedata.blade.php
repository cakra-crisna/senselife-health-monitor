@extends('index')

@section('title', 'Compare Data')

@section('page-css')
<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
<link href="{{{ asset('assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css') }}}" rel="stylesheet" />
<link href="{{{ asset('assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css') }}}" rel="stylesheet" />
<link href="{{{ asset('assets/plugins/parsley/src/parsley.css') }}}" rel="stylesheet" />
<link href="{{{ asset('assets/plugins/bootstrap-eonasdan-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}}" rel="stylesheet" />
<!-- ================== END PAGE LEVEL STYLE ================== -->
@endsection

@section('content')
<!-- begin #content -->
<div id="content" class="content">
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Compare Data</h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
				<!-- begin col-3 -->
				<div class="col-md-3 col-sm-6">
					<div class="widget widget-stats bg-green">
						<div class="stats-icon"><i class="fa fa-fire"></i></div>
						<div class="stats-info">
							<h4>TOTAL CALORIES</h4>
							<p id="totalCalorieText">0</p>	
						</div>
					</div>
				</div>
				<!-- end col-3 -->
				<!-- begin col-3 -->
				<div class="col-md-3 col-sm-6">
					<div class="widget widget-stats bg-blue">
						<div class="stats-icon"><i class="fa fa-flag-checkered"></i></div>
						<div class="stats-info">
							<h4>TOTAL STEPS</h4>
							<p id="totalStepsText">0</p>	
						</div>
					</div>
				</div>
				<!-- end col-3 -->
				<!-- begin col-3 -->
				<div class="col-md-3 col-sm-6">
					<div class="widget widget-stats bg-purple">
						<div class="stats-icon"><i class="fa fa-road"></i></div>
						<div class="stats-info">
							<h4>DISTANCE TRAVELLED</h4>
							<p id="totalDistanceText">0 MILES</p>	
						</div>
					</div>
				</div>
				<!-- end col-3 -->
				<!-- begin col-3 -->
				<div class="col-md-3 col-sm-6">
					<div class="widget widget-stats bg-red">
						<div class="stats-icon"><i class="fa fa-clock-o"></i></div>
						<div class="stats-info">
							<h4>Body Temperature</h4>
							<p id="bodyTemperatureValue">0 C</p>	
						</div>
					</div>
				</div>
				<!-- end col-3 -->
			</div>
			<!-- end row -->
			<!-- begin row -->
			<div class="row">
				<!-- begin col-8 -->
				<div class="col-md-12">
					<div id="combined-chart" style="width:100%;height:400px"></div>
				</div>
				<!-- end col-8 -->
				
			</div>
			<!-- end row -->
		</div>
<!-- end #content -->



	@endsection

	@section('page-js')
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="{{{ asset('assets/plugins/DataTables/media/js/jquery.dataTables.js') }}}"></script>
	<script src="{{{ asset('assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js') }}}"></script>
	<script src="{{{ asset('assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js') }}}"></script>
	<script src="{{{ asset('assets/js/table-manage-default.demo.min.js') }}}"></script>
	<script src="{{{ asset('assets/plugins/parsley/dist/parsley.js')}}}"></script>
	<script src="{{{ asset('assets/plugins/flot/jquery.flot.min.js')}}}"></script>
	<script src="{{{ asset('assets/plugins/flot/jquery.flot.time.min.js')}}}"></script>
	<script src="{{{ asset('assets/plugins/flot/jquery.flot.resize.min.js')}}}"></script>
	<script src="{{{ asset('assets/plugins/flot/jquery.flot.pie.min.js')}}}"></script>
	<script src="{{{ asset('assets/plugins/sparkline/jquery.sparkline.js')}}}"></script>

	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		
		$(document).ready(function() {
			App.init();
			//Dashboard.init();
		});
			
	</script>

	<script src="{{{ asset('assets/js/combined.js') }}}"></script>
	<script src="{{{ asset('assets/js/apps.min.js') }}}"></script>
	<script type="text/javascript" src="http://cdn.socket.io/socket.io-1.0.3.js"></script>
	<script src="{{{ asset('assets/js/socket.js') }}}"></script>
	
	@endsection
