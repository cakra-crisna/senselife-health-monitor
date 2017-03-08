@extends('layouts.scaffold')

@section('main')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Create Step</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::open(array('route' => 'steps.store', 'class' => 'form-horizontal')) }}

        <div class="form-group">
            {{ Form::label('user', 'User:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('user', Input::old('user'), array('class'=>'form-control', 'placeholder'=>'User')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('timestamp', 'Timestamp:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('timestamp', Input::old('timestamp'), array('class'=>'form-control', 'placeholder'=>'Timestamp')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('value', 'Value:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::input('number', 'value', Input::old('value'), array('class'=>'form-control')) }}
            </div>
        </div>


<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit('Create', array('class' => 'btn btn-lg btn-primary')) }}
    </div>
</div>

{{ Form::close() }}

@stop


