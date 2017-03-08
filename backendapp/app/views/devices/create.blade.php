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
        <li class="active"><a href="#new-entry" data-toggle="tab"><i class="fa fa-plus m-r-5"></i> <span class="hidden-xs">New Entry</span></a></li>
      </ul>
      <div class="tab-content" data-sortable-id="index-3">
        <div class="tab-pane fade active in" id="new-entry">
          <div class="row">
            <div class="col-md-2"></div>
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
          {{ Form::open(array('route' => 'devices.store', 'class' => 'form-horizontal')) }}

              <div class="form-group">
                  {{ Form::label('devicetype', 'Devicetype:', array('class'=>'col-md-2 control-label')) }}
                  <div class="col-sm-10">
                    {{ Form::text('devicetype', Input::old('devicetype'), array('class'=>'form-control', 'placeholder'=>'Devicetype')) }}
                  </div>
              </div>

              <div class="form-group">
                  {{ Form::label('devicename', 'Devicename:', array('class'=>'col-md-2 control-label')) }}
                  <div class="col-sm-10">
                    {{ Form::text('devicename', Input::old('devicename'), array('class'=>'form-control', 'placeholder'=>'Devicename')) }}
                  </div>
              </div>

              <div class="form-group">
                  {{ Form::label('deviceid', 'Deviceid:', array('class'=>'col-md-2 control-label')) }}
                  <div class="col-sm-10">
                    {{ Form::text('deviceid', Input::old('deviceid'), array('class'=>'form-control', 'placeholder'=>'Deviceid')) }}
                  </div>
              </div>
               <input type="hidden" name="created_by" value="{{ Auth::user()->id }}" />
               

      <div class="form-group">
          <label class="col-sm-2 control-label">&nbsp;</label>
          <div class="col-sm-10">
            {{ Form::submit('Create', array('class' => 'btn btn-sm btn-primary')) }}
          </div>
      </div>

      {{ Form::close() }}

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
<script src="{{{ asset('assets/plugins/masked-input/masked-input.min.js') }}}"></script>
<script src="{{{ asset('assets/js/apps.min.js') }}}"></script>
<!-- ================== END PAGE LEVEL JS ================== -->

<script>
  $(document).ready(function() {
    App.init();
            //Dashboard.init();
            TableManageDefault.init();      
            $("#masked-input-phone,#masked-input-phone1").mask("(999) 999-9999");
          });
</script>

@endsection


