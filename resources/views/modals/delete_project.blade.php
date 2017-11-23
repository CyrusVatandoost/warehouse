<div class="modal fade" id="modal-container-delete-project" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel">Delete Project</h4>
			</div>

      <div class="modal-body">
        <p>
        	Are you sure to delete {{ $project->name }}?
        </p>
      </div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<a class="btn btn-danger" href="{{ url('project/delete/'.$project->id) }}">Delete</a>
			</div>

		</div>
	</div>
</div>