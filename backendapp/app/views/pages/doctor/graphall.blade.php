@extends('index-fullpage')

@section('title', 'Start Your Day')

@section('page-css')
<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href="{{{ asset('assets/plugins/parsley/src/parsley.css') }}}" rel="stylesheet" />
	<!-- ================== END PAGE LEVEL STYLE ================== -->
@endsection

@section('content')
<!-- begin #page-container -->
<div id="page-container" class="fade">
	<!-- begin error -->
	<div class="error">
		<div class="error-code m-b-10 animated fadeInDown" style="text-align:center;font-size:30px;bottom:85%">Live Health Monitoring</div>
		<div class="error-content" style="top:10%;width:99.2%;background-color:#fff">
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
							<h4>Heart Rate</h4>
							<p id="currentrate">0 bpm</p>	
						</div>
					</div>
				</div>
				<!-- end col-3 -->
			</div>
			<!-- end row -->

			<div class="row">
				<!-- begin col-8 -->
				<div class="col-md-12">
					<a href="/api/graph/{{$id}}" class="btn btn-sm btn-success">Individual Data</a>
					<a href="/api/graphall/{{$id}}" class="btn btn-sm btn-success">All Data</a>
					<a href="/api/historicaldatadoctor/{{$id}}" class="btn btn-sm btn-success">Individual Historical Data</a>
					<a href="/api/historicaldataalldoctor/{{$id}}" class="btn btn-sm btn-success">All Historical Data</a>
				</div>
			</div>	
			<br>

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
	</div>
	<!-- end error -->
   
</div>
<!-- end page container -->

@endsection

@section('page-js')
<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="{{{ asset('assets/plugins/flot/jquery.flot.min.js')}}}"></script>
<script src="{{{ asset('assets/plugins/flot/jquery.flot.time.min.js')}}}"></script>
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
