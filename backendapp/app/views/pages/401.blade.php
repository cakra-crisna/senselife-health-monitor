@extends('index')

@section('title', 'Permission Denied')

@section('page-css')
<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
<style>
.error-code, .error-content{
    position:relative;

}
.error-message{
    padding:10px;
}
</style>
<!-- ================== END PAGE LEVEL STYLE ================== -->
@endsection

@section('content')
<!-- begin #content -->
<div id="content" class="content">
	<!-- begin error -->
        <div class="error">
            <div class="error-code m-b-10">401 <i class="fa fa-warning"></i></div>
            <div class="error-content">
                <div class="error-message">Permission Denied..</div>
                
            </div>
        </div>
        <!-- end error -->
</div>
@endsection

@section('page-js')
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="{{{ asset('assets/js/apps.min.js') }}}"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
			//Dashboard.init();
		
		});
	</script>
	
@endsection
