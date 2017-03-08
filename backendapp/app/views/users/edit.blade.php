@extends('index')

@section('title', 'Users Page')

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
	<h1 class="page-header">Edit User</h1>
	<!-- end page-header -->
	
	<div class="row">
		<div class="col-md-12">
			
			<div class="tab-content" data-sortable-id="index-3">
				
				<div class="row">
          <div class="col-md-12">


           @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
          </div>
        @endif
    </div>
</div>

{{ Form::model($user, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('users.update', $user->id))) }}

        <div class="form-group">
            {{ Form::label('firstname', 'Firstname:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('firstname', Input::old('firstname'), array('class'=>'form-control', 'placeholder'=>'Firstname')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('lastname', 'Lastname:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('lastname', Input::old('lastname'), array('class'=>'form-control', 'placeholder'=>'Lastname')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('dob', 'Dob:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::input('date','dob', Input::old('dob'), array('class'=>'form-control', 'placeholder'=>'Dob')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('height', 'Height:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::input('number','height', Input::old('height'), array('class'=>'form-control', 'placeholder'=>'Height')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('weight', 'Weight:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::input('number','weight', Input::old('weight'), array('class'=>'form-control', 'placeholder'=>'Weight')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('gender', 'Gender:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::select('gender', array('male' => 'Male','female' => 'Female','other' => 'Other'),Input::old('usertype'),array('class'=>'form-control', 'placeholder'=>'Usertype')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label(' usertype', ' Usertype:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
               {{ Form::select('usertype', array('patient' => 'Patient','doctor' => 'Doctor','manager' => 'Manager'),Input::old('usertype'),array('class'=>'form-control', 'placeholder'=>'Usertype','required'=>'true')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('email', 'Email:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('email', Input::old('email'), array('class'=>'form-control', 'placeholder'=>'Email')) }}
            </div>
        </div>
<!-- 
        <div class="form-group">
            {{ Form::label('password', 'Password:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('password', Input::old('password'), array('class'=>'form-control', 'placeholder'=>'Password')) }}
            </div>
        </div> -->


<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit('Update', array('class' => 'btn btn-sm btn-primary')) }}
      {{ link_to_route('users.show', 'Cancel', $user->id, array('class' => 'btn btn-sm btn-default')) }}
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
  <script src="{{{ asset('assets/js/apps.min.js') }}}"></script>
  <!-- ================== END PAGE LEVEL JS ================== -->

  <script>
   $(document).ready(function() {
    App.init();
		});
	</script>
	
	@endsection
