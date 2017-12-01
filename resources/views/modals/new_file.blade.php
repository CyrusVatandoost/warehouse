<form method="POST" action="/project/add/files/.$project->project_id.">

	{{ csrf_field() }}

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
						<label for="project_name">Name</label>
						<input type="text" class="form-control" id="project_name" name="project_name"/>
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button> 
					<button type="submit" class="btn btn-primary">Add Project</button>
				</div>

			</div>
		</div>
	</div>

</form>