@extends('index')

@section('title', 'Users')

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
		<li class="active">Users</li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Users</h1>
	<!-- end page-header -->
	
	<div class="row">
		<!-- begin col-12 -->
		<div class="col-md-12 ui-sortable">
			
			<ul class="nav nav-tabs nav-tabs-inverse nav-justified nav-justified-mobile" data-sortable-id="index-2">
				<li class="active"><a href="#new-entry" data-toggle="tab"><i class="fa fa-plus m-r-5"></i> <span class="hidden-xs">New Entry</span></a></li>
				<li class=""><a href="#allusers" data-toggle="tab"><i class="fa fa-reorder m-r-5"></i> <span class="hidden-xs">All Users</span></a></li>
			</ul>
			<div class="tab-content" data-sortable-id="index-3">
				<div class="tab-pane fade active in" id="new-entry">

					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-9 noticearea">
							
						</div>
					</div>

					<form method="POST" action="{{{ URL::to('users') }}}" accept-charset="UTF-8" class="form-horizontal ajaxform_create" data-parsley-validate="true">
						<input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
					
					<div class="form-group">
						<label class="col-md-2 control-label">First Name</label>
						<div class="col-md-9">
							<input name="firstname" type="text" class="form-control" placeholder="First Name" data-parsley-required="true">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Last Name</label>
						<div class="col-md-9">
							<input name="lastname" type="text" class="form-control" placeholder="Last Name" data-parsley-required="true">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Phone Number</label>
						<div class="col-md-9">
							<input name="phonenumber" id="masked-input-phone" type="text" class="form-control" placeholder="XXX-XXXX-XXX"  data-parsley-pattern="^[\d\+\-\.\(\)\/\s]*$" data-parsley-required="true">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Tech Name</label>
						<div class="col-md-9">
							<input name="techname" type="text" class="form-control" placeholder="Tech Name" data-parsley-required="true">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Salary (Per Hour)</label>
						<div class="col-md-9">
							<input name="salary" type="number" class="form-control" placeholder="Salary" data-parsley-type="number" data-parsley-required="true">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Email Address</label>
						<div class="col-md-9">
							<input name="email" type="text" class="form-control" placeholder="Email Address" data-parsley-type="email" data-parsley-required="true">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Password</label>
						<div class="col-md-9">
							<input name="password" type="text" class="form-control" placeholder="Password" data-parsley-required="true">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">User type</label>
						<div class="col-md-9">
							<select name="usertype" class="form-control" name="paymentmode" data-parsley-required="true">
								<option></option>
								<option>Admin</option>
								<option>Technician</option>
								<option>Trainee</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label">Address</label>
						<div class="col-md-9">
							<textarea  name="address" class="form-control" placeholder="Textarea" rows="5"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Additional Remarks</label>
						<div class="col-md-9">
							<textarea  name="remarks" class="form-control" placeholder="Textarea" rows="5"></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label"></label>
						<div class="col-md-9">
							<button type="submit" class="btn btn-sm btn-success">Submit</button>
						</div>
					</div>
				</form>
			</div>
			<div class="tab-pane fade table-responsive" id="allusers">
				<!-- <table id="data-table" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Device Name</th>
							<th>Part Name</th>
							<th>Part Type</th>
							<th>Tech</th>
							<th>Additional Remark</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<tr class="odd gradeX">
							<td><p>MacBook Pro A1286</p></td>
							<td><p>Screen</p></td>
							<td><p>LCD</p></td>
							<td><p>Goke</p></td>
							<td><p>Very exclusive item. Handle with care</p></td>
							<td>
								<a href="#editpopup" class="btn btn-xs btn-success" data-toggle="modal">Edit</a>
								<a href="#deletepopup" class="btn btn-xs btn-danger" data-toggle="modal">Delete</a>
							</td>
						</tr>
						<tr class="odd gradeX">
							<td><p>Lenovo</p></td>
							<td><p>Screen</p></td>
							<td><p>LCD</p></td>
							<td><p>AP</p></td>
							<td><p>Very exclusive item. Handle with care</p></td>
							<td>
								<a href="#editpopup" class="btn btn-xs btn-success" data-toggle="modal">Edit</a>
								<a href="#deletepopup" class="btn btn-xs btn-danger" data-toggle="modal">Delete</a>
							</td>
						</tr>
					</tbody>
				</table> -->
			</div>
		</div>
	</div>
	<!-- end col-8 -->

</div> 

<div class="modal fade" id="editpopup" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<form class="form-horizontal" action="#" data-parsley-validate="true">

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title">Edit</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label class="col-md-3 control-label">First Name</label>
						<div class="col-md-9">
							<input type="text" class="form-control" placeholder="First Name" data-parsley-required="true">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Last Name</label>
						<div class="col-md-9">
							<input type="text" class="form-control" placeholder="Last Name" data-parsley-required="true">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Phone Number</label>
						<div class="col-md-9">
							<input type="text" id="masked-input-phone1" class="form-control" placeholder="XXX-XXXX-XXX"  id="masked-input-phone1" data-parsley-pattern="^[\d\+\-\.\(\)\/\s]*$" data-parsley-required="true">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Tech Name</label>
						<div class="col-md-9">
							<input type="text" class="form-control" placeholder="Tech Name" data-parsley-required="true">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Salary (Per Hour)</label>
						<div class="col-md-9">
							<input type="text" class="form-control" placeholder="Salary" data-parsley-type="number" data-parsley-required="true">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Email Address</label>
						<div class="col-md-9">
							<input type="text" class="form-control" placeholder="Email Address" data-parsley-type="email" data-parsley-required="true">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Password</label>
						<div class="col-md-9">
							<input type="text" class="form-control" placeholder="Password" data-parsley-required="true">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">User type</label>
						<div class="col-md-9">
							<select class="form-control" name="paymentmode" data-parsley-required="true">
								<option></option>
								<option>Admin</option>
								<option>Technician</option>
								<option>Trainee</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">Address</label>
						<div class="col-md-9">
							<textarea class="form-control" placeholder="Textarea" rows="5"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Additional Remarks</label>
						<div class="col-md-9">
							<textarea class="form-control" placeholder="Textarea" rows="5"></textarea>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
					<button type="submit" class="btn btn-sm btn-success">Save Changes</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Delete popup start -->
<div class="modal fade" id="deletepopup" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title">Caution!!</h4>
			</div>
			<div class="modal-body">
				<div class="alert alert-danger m-b-0">
					<h4><i class="fa fa-info-circle"></i>Do you really want to delete?</h4>
					<p>Once the item is deleted it cannot be retrived back. It directly goes to heaven and becomes an angel. May a star who knows.. Isnt it the biggest mistery of this life??<br>
						After all these do you still want to delete this poor old item <i class="fa fa-frown-o"></i> ?
					</p>
				</div>
			</div>
			<div class="modal-footer">
				<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
				<a href="javascript:;" class="btn btn-sm btn-danger" data-dismiss="modal">Delete</a>
			</div>
		</div>
	</div>
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
