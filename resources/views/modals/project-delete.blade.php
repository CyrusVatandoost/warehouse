<div class="modal fade" id="modal-project-delete" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Delete Project</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
			</div>

      <div class="modal-body">
        <p>
        	Are you sure to delete {{ $project->name }}?
        </p>
      </div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<a class="btn btn-danger" href="{{ url('project/delete/'.$project->project_id) }}">Delete</a>
			</div>

		</div>
	</div>
</div>