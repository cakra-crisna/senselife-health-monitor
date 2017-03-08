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
		<div class="error-code m-b-10 animated fadeInDown" style="text-align:center;font-size:50px;bottom:80%">Awesome ! One last detail.</div>
		<div class="error-content" style="top:20%;width:100%">
			<div class="row" style="width:100%">
                <!-- begin col-12 -->
			    <div class="col-md-offset-2 col-md-8 ui-sortable">
			        <!-- begin panel -->
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                           
                            <h4 class="panel-title" style="font-size:18px;text-align:left">Update your profile</h4>
                        </div>
                        <div class="panel-body">
								<div>
									@if ($errors->any())
		                            <div class="alert alert-danger">
		                                <ul>
		                                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
		                                </ul>
		                            </div>
		                        @endif
								
								{{ Form::model($user, array('class' => 'form-horizontal', 'method' => 'POST', 'route' => array('updateprofile', $user->id))) }}

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
						            {{ Form::label('email', 'Email:', array('class'=>'col-md-2 control-label')) }}
						            <div class="col-sm-10">
						              {{ Form::text('email', Input::old('email'), array('class'=>'form-control', 'placeholder'=>'Email')) }}
						            </div>
						        </div>

						<div class="form-group">
						    <label class="col-sm-2 control-label">&nbsp;</label>
						    <div class="col-sm-2">
						      {{ Form::submit('Update', array('class' => 'btn btn-sm btn-primary')) }}
						    </div>
						</div>

						{{ Form::close() }}

								</div>
								
                            </form>
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-12 -->
            </div>
		</div>
	</div>
	<!-- end error -->
   
</div>
<!-- end page container -->

@endsection

@section('page-js')
<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="{{{ asset('assets/plugins/parsley/dist/parsley.js')}}}"></script>
<script src="{{{ asset('assets/js/apps.min.js') }}}"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
			//FormWizardValidation.init();
		});
	</script>
@endsection
