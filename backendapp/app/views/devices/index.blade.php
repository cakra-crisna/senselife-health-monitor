@extends('index')

@section('title', 'Devices')

@section('page-css')
<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
<link href="{{{ asset('assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css') }}}" rel="stylesheet" />
<link href="{{{ asset('assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css') }}}" rel="stylesheet" />
<link href="{{{ asset('assets/plugins/parsley/src/parsley.css') }}}" rel="stylesheet" />
<!-- ================== END PAGE LEVEL STYLE ================== -->
@endsection

@section('content')
<!-- begin #content -->
<div id="content" class="content">
	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li><a href="javascript:;">Home</a></li>
		<li class="active">Devices</li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Devices</h1>
	<!-- end page-header -->

	<div class="row">
		<!-- begin col-12 -->
		<div class="col-md-12 ui-sortable">

			<ul class="nav nav-tabs nav-tabs-inverse nav-justified-mobile" data-sortable-id="index-2">
				<li class="active"><a href="#new-entry" data-toggle="tab"><i class="fa fa-tasks m-r-5"></i> <span class="hidden-xs">All devices</span></a></li>
				<li><a href="{{ route('devices.create') }}" id="createtab"><i class="fa fa-plus m-r-5"></i> <span class="hidden-xs">Add new device</span></a></li>
			</ul>
			<div class="tab-content" data-sortable-id="index-3">
				
				<div class="tab-pane fade active in" id="new-entry">
					<div class="row">
						<div class="col-md-2">
							
						</div>
						<div class="col-md-10">
							@if ($errors->any())
							<div class="alert alert-danger">
								<ul>
									{{ implode('', $errors->all('<li class="error">:message</li>')) }}
								</ul>
							</div>
							@endif        
						</div>
					</div>
					
					<br>
					
					@if ($devices->count())
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Devicetype</th>
								<th>Devicename</th>
								<th>Deviceid</th>
								<!-- <th>Created_by</th> -->
								<th>&nbsp;</th>
							</tr>
						</thead>

						<tbody>
							@foreach ($devices as $device)
								<tr>
									<td>{{{ $device->devicetype }}}</td>
									<td>{{{ $device->devicename }}}</td>
									<td>{{{ $device->deviceid }}}</td>
									<!-- <td>{{{ $device->created_by }}}</td> -->
				                    <td>
				                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('devices.destroy', $device->id))) }}
				                            {{ Form::submit('Delete', array('class' => 'btn btn-xs btn-danger')) }}
				                        {{ Form::close() }}
				                        {{ link_to_route('devices.edit', 'Edit', array($device->id), array('class' => 'btn btn-xs btn-info')) }}
				                    </td>
								</tr>
							@endforeach
						</tbody>
					</table>
				@else
					There are no devices
				@endif


				</div>

			</div>
		</div>
		<!-- end col-8 -->

	</div> 

</div>
@include('popups.delete_alert')
@endsection

@section('page-js')
<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="{{{ asset('assets/plugins/DataTables/media/js/jquery.dataTables.js') }}}"></script>
<script src="{{{ asset('assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js') }}}"></script>
<script src="{{{ asset('assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js') }}}"></script>
<script src="{{{ asset('assets/js/table-manage-default.demo.min.js') }}}"></script>
<script src="{{{ asset('assets/plugins/parsley/dist/parsley.js')}}}"></script>

<script src="{{{ asset('assets/js/apps.min.js') }}}"></script>
<!-- ================== END PAGE LEVEL JS ================== -->

<script>
	$(document).ready(function() {
		App.init();
            //Dashboard.init();
            TableManageDefault.init();      
            $("a#createtab").click(function(){
            	window.location = $(this).attr('href');
            });
        });
    </script>
    
    @endsection
