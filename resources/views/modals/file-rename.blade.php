<form method="POST" action="/project/{{$project->project_id}}/file-rename/{{$file->file_id}}">

	{{ csrf_field() }}

	<div class="modal fade" id="modal-file-rename-{{$file->file_id}}" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Rename File</h4>
					 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button>
				</div>

				<div class="modal-body">
					<div class="input-group">
					  <span class="input-group-addon" id="basic-addon1">Save as</span>
					  <input type="text" class="form-control" placeholder="File name" aria-label="Username" aria-describedby="basic-addon1" name="name" value="{{$file->name}}">
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button> 
					<button type="submit" class="btn btn-browse">Rename</button>
				</div>

			</div>
		</div>
	</div>

</form>