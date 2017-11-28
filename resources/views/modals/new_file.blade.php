 {{  Form::open(array('action'=>'LogInController@doLogIn', 'method' => 'post')) }}	

	<div class="modal fade" id="modal-container-new-file" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">New File</h4>
					 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
	      </button>
				</div>

				<div class="modal-body">
					<div class="form-group">
						<label for="file_name">Name</label>
						<input type="text" class="form-control" id="file_name" name="file_name"/>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button> 
						<button type="submit" class="btn btn-primary">Add File</button>
					</div>
				</div>

			</div>
		</div>
	</div>

{{ Form::close }}