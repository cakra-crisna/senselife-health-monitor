@extends('index')

@section('title', 'Work page')

@section('page-css')
<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
<link href="{{{ asset('assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css') }}}" rel="stylesheet" />
<link href="{{{ asset('assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css') }}}" rel="stylesheet" />
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
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Repair Details<small> #</small></h1>
	<!-- end page-header -->
	
	<div class="row">
		<div class="col-md-12">
			<!-- begin panel -->
			<div class="panel panel-inverse panel-with-tabs">
				<div class="panel-heading">
					<ul id="myTab" class="nav nav-tabs nav-tabs-inverse pull-left">
						<li class="active"><a href="#tab-first" data-toggle="tab"><i class="fa fa-cog"></i> <span class="hidden-xs">Details</span></a></li>
						<li><a href="#tab-second" data-toggle="tab"><i class="fa fa-tasks"></i> <span class="hidden-xs">Logs</span></a></li>
						<li><a href="#tab-third" data-toggle="tab"><i class="fa fa-external-link"></i> <span class="hidden-xs">Pickup Details</span></a></li>
						<li><a href="#tab-receipt" data-toggle="tab"><i class="fa fa-file-text"></i> <span class="hidden-xs">Receipts</span></a></li>
					</ul>
					<h4 class="panel-title" style="visibility:hidden">Panel with Tabs</h4>
				</div>
				<div id="myTabContent" class="tab-content">
					<div class="tab-pane fade in active" id="tab-first">
						<div class="row">
							<div class="col-md-6">
								<dl>
									<dt>Order Date</dt>
									<dd>{{{ $workorder->order_date }}}</dd>
									<br>
									<dt>customer_name</dt>
									<dd>{{{ $workorder->customer_name }}}</dd>
									<br>
									<dt>phone_number</dt>
									<dd>{{{ $workorder->phone_number }}}</dd>
									<br>
									<dt>serial</dt>
									<dd>{{{ $workorder->serial }}}</dd>
									<br>
									<dt>passcode</dt>
									<dd>{{{ $workorder->passcode }}}</dd>
									<br>
									<dt>agreement_waterdamage</dt>
									<dd>{{{ $workorder->agreement_waterdamage }}}</dd>
									<br>
									<dt>agreement_heattreatment</dt>
									<dd>{{{ $workorder->agreement_heattreatment }}}</dd>
									<br>
									<dt>agreement_dataloss</dt>
									<dd>{{{ $workorder->agreement_dataloss }}}</dd>
									<br>

								</dl>

							</div>
							<div class="col-md-6">
								<dl>
									<dt>tech</dt>
									<dd>{{{ $workorder->tech }}}</dd>
									<br>

									<dt>problem_description</dt>
									<dd>{{{ $workorder->problem_description }}}</dd>
									<br>

									<dt>remarks</dt>
									<dd>{{{ $workorder->remarks }}}</dd>
									<br>
									<dt>structural_defects</dt>
									<dd>{{{ $workorder->structural_defects }}}</dd>
									<br>
									<dt>repair_status</dt>
									<dd>{{{ $workorder->repair_status }}}</dd>
									<br>
									<dt>not_fixing_reason</dt>
									<dd>{{{ $workorder->not_fixing_reason }}}</dd>
									<br>
								</dl>
								<a href="/printworkorder/{{{ $workorder->id }}}" target="_blank" class="btn btn-primary btn-sm">Print</a>

							</div>
						</div>
					</div>
					<div class="tab-pane fade table-responsive" id="tab-second">
						@if ($workorder->repairlogs->count())
							<table class="table table-striped">
								<thead>
									<tr>
										<th>Date and Time:</th>
										<th>Tech</th>
										<th>Update</th>
										<th>Current_status</th>
										<th>Remarks</th>
										<th>&nbsp;</th>
									</tr>
								</thead>

								<tbody>
									@foreach ($workorder->repairlogs as $repairlog)
										<tr>
											<td>{{{ $repairlog->dateandtime }}}</td>
											<td>{{{ $repairlog->tech }}}</td>
											<td style="max-width:25%;widht:25%">{{{ $repairlog->update }}}</td>
											<td>{{{ $repairlog->current_status }}}</td>
											<td>{{{ $repairlog->remarks }}}</td>
						                    <td>
						                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('repairlogs.destroy', $repairlog->id))) }}
						                            {{ Form::submit('Delete', array('class' => 'btn btn-xs btn-danger')) }}
						                        {{ Form::close() }}
						                        {{ link_to_route('repairlogs.edit', 'Edit', array($repairlog->id), array('class' => 'btn btn-xs btn-info')) }}
						                    </td>
										</tr>
									@endforeach
								</tbody>
							</table>
						@else
							There are no repairlogs
						@endif
						
					</div>
					<div class="tab-pane fade in" id="tab-third">
						@if ($workorder->pickups->count())
							
	@foreach ($workorder->pickups as $pickup)
										<tr>
											<dl>
									<dt>Date and Time</dt>
									<dd>{{{ $pickup->dateandtime }}}</dd>
									<br>
									<dt>Service_required</dt>
									<dd>{{{ $pickup->service_required }}}</dd>
									<br>
									<dt>Price</dt>
									<dd>{{{ $pickup->price }}}</dd>
									<br>
									<dt>Techname</dt>
									<dd>{{{ $pickup->tech }}}</dd>
									<br>
									<dt>Mode_of_transaction</dt>
									<dd>{{{ $pickup->mode_of_transaction }}}</dd>
									<br>
									<dt>Idcard_number</dt>
									<dd>{{{ $pickup->idcard_number }}}</dd>
									<br>
									<dt>Idcard_expiry_date</dt>
									<dd>{{{ $pickup->idcard_expiry_date }}}</dd>
									<br>
									<dt>Remarks</dt>
									<dd>{{{ $pickup->remarks }}}</dd>
									<br>
								</dl>
								            <td>
						                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('pickups.destroy', $pickup->id))) }}
						                            {{ Form::submit('Delete', array('class' => 'btn btn-xs btn-danger')) }}
						                        {{ Form::close() }}
						                        {{ link_to_route('pickups.edit', 'Edit', array($pickup->id), array('class' => 'btn btn-xs btn-info')) }}
						                    </td>
										</tr>
									@endforeach
								
						@else
							There are no pickups for this work order
						@endif
					</div>
					<div class="tab-pane fade in" id="tab-receipt">
						<div class="row">
							@if ($workorder->Receipt->count())

					            <div class="col-lg-12">
					                <div class="row">
				                		<div class="col-md-6"><h1 class="page-header">Receipts for this work order</h1></div>
				                		<div class="col-md-6"><a href="#upload-receipt" data-workorderid="{{{ $workorder->id }}}" class="btn btn-primary btn-sm uploadreceiptbutton" data-toggle="modal">Add new receipt</a></div>
					                </div>
					            </div>

								@foreach ($workorder->Receipt as $receipt)
									<div class="row">
										<div class="col-md-12 thumbdiv">
											<span>{{ $receipt->remarks }}</span>
							                <a href="#modal-delete" class="btn btn-danger btn-sm delete_record" data-route="{{ route('receipts.destroy',array($receipt->id)) }}" data-toggle="modal">Delete</a>	
										</div>
										
							        </div>
									@foreach ($receipt->pictures as $picture)
										<div class="col-lg-3 col-md-4 col-xs-6 thumb">
							                <a class="thumbnail" href="{{ asset('uploads/receipts/'.$picture->pic_name) }}" target="_blank">
							                    <img class="img-responsive" src="{{ asset('uploads/receipts/'.$picture->pic_name) }}" alt="">
							                </a>
							                
							            </div>
									@endforeach
							
								@endforeach
							@else
								<div class="col-md-6"><a href="#upload-receipt" data-workorderid="{{{ $workorder->id }}}" class="btn btn-primary btn-sm uploadreceiptbutton" data-toggle="modal">Add new receipt</a></div>
							@endif
				            
				        </div>

					</div>
				</div>

			</div>
		</div>
		<!-- end panel -->
		@include('popups.add_receipt')
		@include('popups.delete_alert')
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
			$(".uploadreceiptbutton").click(function(){
				$("input[name=work_order]").val($(this).data("workorderid"));
			});

		});
	</script>
	
	@endsection
