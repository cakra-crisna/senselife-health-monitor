<div class="modal fade" id="modal-delete" style="display: none;">
	{{ Form::open(array('method' => 'DELETE','class' => 'ajaxform_delete')) }}
	<div class="modal-dialog">
		<div class="modal-content">
			
		
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title">Danger!</h4>
			</div>
			<div class="modal-body">
				<div class="alert alert-danger m-b-0">
					<h4><i class="fa fa-info-circle"></i> </h4>
					<p>Do you really want to delete this item?</p>
				</div>
			</div>
			<div class="modal-footer delete-model">
				<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
				
				<button type="submit" class="btn btn-sm btn-danger">Confirm</button>

			</div>
		</div>
	</div>

			{{ Form::close() }}

</div>
