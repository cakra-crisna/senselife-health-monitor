@extends('index')

@section('title', 'Blank page')

@section('page-css')
<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
<link href="{{{ asset('assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css') }}}" rel="stylesheet" />
<link href="{{{ asset('assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css') }}}" rel="stylesheet" />
<!-- ================== END PAGE LEVEL STYLE ================== -->
@endsection

@section('content')
<!-- begin #content -->
<div id="content" class="content">
	<!-- begin page-header -->
	<h1 class="page-header">User detail</h1>
	<!-- end page-header -->
	
	<div class="row">
		<div class="col-md-12">
			
			<div class="tab-content" data-sortable-id="index-3">
	

<p>{{ link_to_route('users.index', 'Return to All users', null, array('class'=>'btn btn-sm btn-primary')) }}</p>

<table class="table table-striped">
  <thead>
    <tr>
      <th>Firstname</th>
        <th>Lastname</th>
        <th>Dob</th>
        <th>Height</th>
        <th>Weight</th>
        <th>Gender</th>
        <th> Usertype</th>
        <th>Email</th>
        
    </tr>
  </thead>

  <tbody>
    <tr>
      <td>{{{ $user->firstname }}}</td>
          <td>{{{ $user->lastname }}}</td>
          <td>{{{ $user->dob }}}</td>
          <td>{{{ $user->height }}}</td>
          <td>{{{ $user->weight }}}</td>
          <td>{{{ $user->gender }}}</td>
          <td>{{{ $user-> usertype }}}</td>
          <td>{{{ $user->email }}}</td>
    </tr>
  </tbody>
</table>
      </div>
    </div>
  </div>
  <!-- end #content -->

  @endsection

  @section('page-js')
  <!-- ================== BEGIN PAGE LEVEL JS ================== -->
  <script src="{{{ asset('assets/plugins/DataTables/media/js/jquery.dataTables.js') }}}""></script>
  <script src="{{{ asset('assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js') }}}""></script>
  <script src="{{{ asset('assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js') }}}""></script>
  <script src="{{{ asset('assets/js/table-manage-default.demo.min.js') }}}""></script>

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
