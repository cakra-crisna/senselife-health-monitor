@extends('index')

@section('title', 'Devices')

@section('page-css')
<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
<link href="{{{ asset('assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css') }}}" rel="stylesheet" />
<link href="{{{ asset('assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css') }}}" rel="stylesheet" />
<link href="{{{ asset('assets/plugins/parsley/src/parsley.css') }}}" rel="stylesheet" />
<style>
.thumb {
    margin-bottom: 30px;
}
.thumbdiv {
    margin:10px;
}

a.thumbnail{
	margin-bottom: 5px;
}
</style>
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
				<li class="active"><a href="#details" data-toggle="tab"><i class="fa fa-tasks m-r-5"></i> <span class="hidden-xs">Device detail</span></a></li>
			</ul>
			<div class="tab-content" data-sortable-id="index-3">
				
				<div class="tab-pane fade active in" id="details">
					<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
				<th>Phone</th>
				<th>Email</th>
				<th>Address</th>
				<th>Relationship</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $emergency->name }}}</td>
					<td>{{{ $emergency->phone }}}</td>
					<td>{{{ $emergency->email }}}</td>
					<td>{{{ $emergency->address }}}</td>
					<td>{{{ $emergency->relationship }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('emergencies.destroy', $emergency->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-sm btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('emergencies.edit', 'Edit', array($emergency->id), array('class' => 'btn btn-sm btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>
	
				</div>
				

			</div>
		</div>
		<!-- end col-8 -->
	</div> 
</div>
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
        });
    </script>
    
    @endsection
