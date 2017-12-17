<div class="modal fade" id="modal-container-project-archive" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Archive Project</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
			</div>

      <div class="modal-body">
        <p>
        	Are you sure to archive {{ $project->name }}?
        </p>
      </div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<a class="btn btn-danger" href="{{ url('project/'.$project->project_id.'/archive') }}">Archive</a>
			</div>

		</div>
	</div>
</div>