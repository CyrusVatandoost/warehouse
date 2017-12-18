<form method="POST" action="/project/{{$project->project_id}}/issue">

	{{ csrf_field() }}

	<div class="modal fade" id="modal-container-new-issue" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">New Issue</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</div>

		    <div class="modal-body">
					<div class="form-group">
						<label for="issue_name">Name</label>
						<input type="text" class="form-control" id="issue_name" name="issue_name"/>
					</div>

					<div class="form-group">
						<label for="issue_assigned_to">Assign someone to this issue (optional)</label>
						<input type="text" class="form-control" id="issue_assigned_to" name="issue_assigned_to"/>
						<br>
						<div class="alert alert-warning" role="alert">
							To assign a issue to someone, input the user's ID. This will be fixed in the future.
						</div>
					</div>
		    </div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-browse">Add issue</button>
				</div>

			</div>
		</div>
	</div>

</form>