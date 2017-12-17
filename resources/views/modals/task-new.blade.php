<form method="POST" action="/project/{{$project->project_id}}/tasks">

	{{ csrf_field() }}

	<div class="modal fade" id="modal-container-new-task" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">New Task</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</div>

		    <div class="modal-body">
					<div class="form-group">
						<label for="task_name">Name</label>
						<input type="text" class="form-control" id="task_name" name="task_name"/>
					</div>

					<div class="form-group">
						<label for="task_assigned_to">Assign someone to this task (optional)</label>
						<input type="text" class="form-control" id="task_assigned_to" name="task_assigned_to"/>
						<br>
						<div class="alert alert-warning" role="alert">
							To assign a task to someone, input the user's ID. This will be fixed in the future.
						</div>
					</div>
		    </div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-browse">Add Task</button>
				</div>

			</div>
		</div>
	</div>

</form>