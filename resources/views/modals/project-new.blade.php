<form method="POST" action="/projects">

	{{ csrf_field() }}

	<div class="modal fade" id="modal-container-new-project" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">New Project</h4>
					 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button>
				</div>

				<div class="modal-body">
					<div class="form-group">
						<label for="project_name">Name</label>
						<input type="text" class="form-control" id="project_name" name="project_name" required>
					</div>
					<div class="form-group">
						<label for="project_description">Description</label>
						<textarea class="form-control" rows="3" name="project_description"></textarea>
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-browse" data-dismiss="modal">Cancel</button> 
					<button type="submit" class="btn btn-primary">Create Project</button>
				</div>

			</div>
		</div>
	</div>

</form>