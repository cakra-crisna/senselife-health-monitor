@extends('index')

@section('title', 'Users page')

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
	<h1 class="page-header">Change Password</h1>
	<!-- end page-header -->
	
	<div class="row">
		<div class="col-md-12">
			
			<div class="tab-content" data-sortable-id="index-3">
				
				<div class="row">
          <div class="col-md-12">


            <div class="row">
    <div class="col-md-10 col-md-offset-2">
        
      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
          </div>
        @endif
    </div>
</div>

{{ Form::open(array('route' => array('users.updatepassword',$id), 'class' => 'form-horizontal')) }}

        <div class="form-group">
            {{ Form::label('password', 'Password:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('password', Input::old('password'), array('class'=>'form-control', 'placeholder'=>'Password')) }}
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">&nbsp;</label>
            <div class="col-sm-10">
              {{ Form::submit('Update Password', array('class' => 'btn btn-sm btn-primary')) }}
            </div>
        </div>

{{ Form::close() }}
          </div>
        </div>


      </div>
    </div>
  </div>
  <!-- end #content -->

  @endsection

  @section('page-js')
  <!-- ================== BEGIN PAGE LEVEL JS ================== -->
  <script src="{{{ asset('assets/plugins/ckeditor/ckeditor.js') }}}"></script>
  
  <script src="{{{ asset('assets/js/form-wysiwyg.demo.min.js') }}}"></script>
  <script src="{{{ asset('assets/js/apps.min.js') }}}"></script>
  <!-- ================== END PAGE LEVEL JS ================== -->

  <script>
   $(document).ready(function() {
    App.init();
			//Dashboard.init();
  
		});
	</script>
	
	@endsection
