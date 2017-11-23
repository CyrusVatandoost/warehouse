<div class="modal fade" id="modal-container-delete-project" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel">Are you sure to delete this project?</h4>
			</div>

			<div class="modal-footer">
				<a class="btn btn-danger btn-block" href="{{ url('project/delete/'.$project->id) }}">Delete</a>
			</div>

		</div>
	</div>
</div>