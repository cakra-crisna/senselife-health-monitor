@extends('index')

@section('title', 'Historical Data')

@section('page-css')
<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
<link href="{{{ asset('assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css') }}}" rel="stylesheet" />
<link href="{{{ asset('assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css') }}}" rel="stylesheet" />
<link href="{{{ asset('assets/plugins/parsley/src/parsley.css') }}}" rel="stylesheet" />

<link href="{{{ asset('assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css') }}}" rel="stylesheet" />
<!-- ================== END PAGE LEVEL STYLE ================== -->
@endsection

@section('content')
<!-- begin #content -->
<div id="content" class="content">
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Historical Data</h1>
	<!-- end page-header -->

	<!-- begin row -->
	<div class="row">
		<!-- begin col-3 -->
		<div class="col-md-6 col-sm-6">
			<form class="form-horizontal form-bordered">
				<div class="form-group">
					<label class="control-label col-md-4">Select Date Range</label>
					<div class="col-md-8">
	                    <div class="input-group date">
	                    	<input type="hidden" name="userid" value="{{ Auth::user()->id }}" />
	                        <input type="text" class="form-control" id="daterange">
	                        <span class="input-group-addon">
	                            <span class="glyphicon glyphicon-calendar"></span>
	                        </span>
	                    </div>
	                    
					</div>
				</div>
			</form>
		</div>
		<div class="col-md-6 col-sm-6">
			<form class="form-horizontal form-bordered">
				<div class="form-group">
					<div class="col-md-8">
	                    <button id="viewdata" class="btn btn-sm btn-success">View</button>

					</div>
				</div>
			</form>
			
		</div>
		
	</div>
	<!-- end row -->
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
<script src="{{{ asset('assets/plugins/flot/jquery.flot.navigate.js')}}}"></script>
<script src="{{{ asset('assets/plugins/flot/jquery.flot.time.min.js')}}}"></script>
<script src="{{{ asset('assets/plugins/flot/jquery.flot.resize.min.js')}}}"></script>
<script src="{{{ asset('assets/plugins/flot/jquery.flot.pie.min.js')}}}"></script>
<script src="{{{ asset('assets/plugins/sparkline/jquery.sparkline.js')}}}"></script>

<script src="{{{ asset('assets/plugins/bootstrap-daterangepicker/moment.js')}}}"></script>
<script src="{{{ asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js')}}}"></script>

<!-- ================== END PAGE LEVEL JS ================== -->

<script>

	$(document).ready(function() {
		App.init();
		var startDateValue = moment().format('YYYY-MM-DD HH:mm:ss');
		var endDateValue = moment().format('YYYY-MM-DD HH:mm:ss');

		$('#daterange').daterangepicker({
			"alwaysShowCalendars":true,
			"timePicker": true,
		    "timePicker24Hour": true,
		    "timePickerIncrement": 5,
			"ranges": {
				'Today': [moment({hour:00}), moment()],
				'Yesterday': [moment({hour:00}).subtract('days', 1), moment({hour:24}).subtract('days', 1)],
				'Last 7 Days': [moment({hour:00}).subtract('days', 6), moment({hour:24})],
				'Last 30 Days': [moment({hour:00}).subtract('days', 29), moment({hour:24})],
				'This Month': [moment({hour:00}).startOf('month'), moment({hour:24}).endOf('month')],
				'Last Month': [moment({hour:00}).subtract('month', 1).startOf('month'), moment({hour:24}).subtract('month', 1).endOf('month')]
			}
		},function(start,end,label){			
				startDateValue = start.format('YYYY-MM-DD HH:mm:ss');
				endDateValue = end.format('YYYY-MM-DD HH:mm:ss');
		});

		$("<div id='tooltip'></div>").css({
	        position: "absolute",
	        display: "none",
	        border: "1px solid rgb(68, 6, 68)",
	        padding: "2px",
	        "background-color": "rgb(68, 6, 68)",
	        opacity: 1
	    }).appendTo("body");
			
		$("#viewdata").click(function(e){
			e.preventDefault();
			var userid = $("input[name=userid]").val();
			console.log(userid);
			console.log(startDateValue);
			console.log(endDateValue);
		
			console.log(baseurl);
			$.get(baseurl+"historicalgraphdata/"+userid+"/"+startDateValue+"/"+endDateValue,function(data){
				//console.log(data);
				heartrateData = data["data"]["heartdata"];
				temperatureData = data["data"]["tempdata"];
				calorieData = data["data"]["caloriedata"];
				stepData = data["data"]["stepdata"];
				//console.log(heartrateData);
				drawCalorie();
				drawHeartRateData();
				drawStep();
				drawTemp();
			});
		});
		
	});

</script>

<script src="{{{ asset('assets/js/historicalcharts/calorie.js') }}}"></script>
<script src="{{{ asset('assets/js/historicalcharts/steps.js') }}}"></script>
<script src="{{{ asset('assets/js/historicalcharts/temperature.js') }}}"></script>
<script src="{{{ asset('assets/js/historicalcharts/heartrate1.js') }}}"></script>

<script src="{{{ asset('assets/js/apps.min.js') }}}"></script>
<script type="text/javascript" src="http://cdn.socket.io/socket.io-1.0.3.js"></script>
<script src="{{{ asset('assets/js/socket.js') }}}"></script>

@endsection
