<!-- #Upload picture modal-dialog -->
<div class="modal fade" id="upload-receipt">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="row">
				<div class="col-md-12 noticearea"></div>
			</div>
			{{ Form::open(array('route' => 'receipts.store','files'=>true, 'class' => 'form-horizontal','data-parsley-validate'=>'true')) }}
			
				<input name="work_order" type="hidden" value="">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title">Upload receipt pictures for this repair</h4>
				</div>
				<div class="modal-body">

					<div class="form-group">
						<label class="col-md-3 control-label">Files to upload</label>
						<div class="col-md-9">
							{{ Form::file('files[]', array('multiple'=>true,'class'=>'form-control','placeholder'=>'Input Files','data-parsley-required'=>'true')) }}
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">Additional Remarks</label>
						<div class="col-md-9">
							<textarea name="remarks" class="form-control" placeholder="Remarks" rows="5"></textarea>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<a href="javascript:;" class="btn btn-sm btn-link" data-dismiss="modal">Close</a>
					<button type="submit" class="btn btn-sm btn-success">Submit</button>
				</div>
			{{ Form::close() }}
		</div>
	</div>
</div>