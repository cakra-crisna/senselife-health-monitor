@extends('index')

@section('title', 'Emergencies')

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
		<li class="active">Emergencies</li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Emergencies</h1>
	<!-- end page-header -->

	<div class="row">
		<!-- begin col-12 -->
		<div class="col-md-12 ui-sortable">

			<ul class="nav nav-tabs nav-tabs-inverse nav-justified-mobile" data-sortable-id="index-2">
				<li class="active"><a href="#new-entry" data-toggle="tab"><i class="fa fa-tasks m-r-5"></i> <span class="hidden-xs">All emergencies</span></a></li>
				<li><a href="{{ route('emergencies.create') }}" id="createtab"><i class="fa fa-plus m-r-5"></i> <span class="hidden-xs">Add New Emergency Contact</span></a></li>
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
					
					@if ($emergencies->count())
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Name</th>
								<th>Phone</th>
								<th>Email</th>
								<th>Address</th>
								<th>Relationship</th>
								<th>&nbsp;</th>
							</tr>
						</thead>

						<tbody>
							@foreach ($emergencies as $emergency)
								<tr>
									<td>{{{ $emergency->name }}}</td>
									<td>{{{ $emergency->phone }}}</td>
									<td>{{{ $emergency->email }}}</td>
									<td>{{{ $emergency->address }}}</td>
									<td>{{{ $emergency->relationship }}}</td>
				                    <td>
				                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('emergencies.destroy', $emergency->id))) }}
				                            {{ Form::submit('Delete', array('class' => 'btn btn-xs btn-danger')) }}
				                        {{ Form::close() }}
				                        {{ link_to_route('emergencies.edit', 'Edit', array($emergency->id), array('class' => 'btn btn-xs btn-info')) }}
				                    </td>
								</tr>
							@endforeach
						</tbody>
					</table>
				@else
					There are no emergencies
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
