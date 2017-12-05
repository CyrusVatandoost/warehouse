<form method="POST" action="/announcement/create">

	{{ csrf_field() }}

	<div class="modal fade" id="modal-container-new-announcement" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">New Announcement</h4>
					 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
       				 </button>
				</div>

				<div class="modal-body">
					<div class="form-group">
						<label for="announcement_name">Name</label>
						<input type="text" class="form-control" id="announcement_name" name="announcement_name"/>
					</div>
					<div class="form-group">
						<label for="announcement_description">Description</label>
						<textarea class="form-control" rows="3" name="announcement_description"></textarea>
					</div>

				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button> 
					<button type="submit" class="btn btn-primary">Post Announcement</button>
				</div>

			</div>
		</div>
	</div>

</form>