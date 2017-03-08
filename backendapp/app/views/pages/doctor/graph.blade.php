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
		<div class="error-content" style="top:10%;width:99.2%">
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
			<div class="row">
				<!-- begin col-8 -->
				<div class="col-md-12">
					
					<ul class="nav nav-tabs nav-tabs-inverse nav-justified nav-justified-mobile" data-sortable-id="index-2">
						<li class="active"><a href="index.html#heartrate" data-toggle="tab"><i class="fa fa-heartbeat m-r-5"></i> <span class="hidden-xs">Heart Rate</span></a></li>
						<li class=""><a href="index.html#calories" data-toggle="tab"><i class="fa fa-fire m-r-5"></i> <span class="hidden-xs">Calories</span></a></li>
						<li class=""><a href="index.html#steps" data-toggle="tab"><i class="fa fa-flag-checkered m-r-5"></i> <span class="hidden-xs">Steps</span></a></li>
						<li class=""><a href="index.html#distance" data-toggle="tab"><i class="fa fa-road m-r-5"></i> <span class="hidden-xs">Body Temperature</span></a></li>
					</ul>
					<div class="tab-content" data-sortable-id="index-3">
						<div class="tab-pane fade active in" id="heartrate">
							<div id="heartRateChart" style="width:100%;height:320px;"></div>
							<button id="currentrate" class="btn btn-lg btn-success"></button>
							
						</div>
						<div class="tab-pane fade" id="calories">
							<div id="calorieChart" style="width:100%;height:320px;"></div>
						</div>
						<div class="tab-pane fade" id="steps">
							<div id="stepCharts" style="width:100%;height:320px;"></div>
						</div>

						<div class="tab-pane fade" id="distance">
							<div id="tempChart" style="width:100%;height:320px;"></div>
						</div>
					</div>
					
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
<script type="text/javascript" src="http://cdn.socket.io/socket.io-1.0.3.js"></script>
<script src="{{{ asset('assets/js/heartrate.js') }}}"></script>

<script src="{{{ asset('assets/js/apps.min.js') }}}"></script>

<script src="{{{ asset('assets/js/distance.js') }}}"></script>
<script src="{{{ asset('assets/js/calorie.js') }}}"></script>
<script src="{{{ asset('assets/js/steps.js') }}}"></script>
<script src="{{{ asset('assets/js/temperature.js') }}}"></script>
<script src="{{{ asset('assets/js/heartrate1.js') }}}"></script>
<script type="text/javascript" src="http://cdn.socket.io/socket.io-1.0.3.js"></script>
<script src="{{{ asset('assets/js/socket.js') }}}"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
			//FormWizardValidation.init();
		});
	</script>

@endsection
