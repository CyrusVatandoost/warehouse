<div class="tab-pane" id="panel-settings">

	<p>
  <h4>Project Name</h4>

  <!-- form to change project name -->
	<form class="form-inline" method="POST" action="/project/{{$project->project_id}}/change-name">
		{{ csrf_field() }}
		<input class="form-control" type="text" name="name" placeholder="{{$project->name}}">&nbsp;
	  <button type="submit" class="btn btn-primary">Change Name</button>
	</form>

	<p>
  <h4>Project Heads</h4>
  <ul class="list-group">
	  <li class="list-group-item">Name Here</li>
	  <li class="list-group-item">
	  	<form class="form-inline">
			  <input type="text" class="form-control" id="inputPassword2" placeholder="Add Collaborator">
			  &nbsp;
			  <button type="submit" class="btn btn-primary">Add</button>
			</form>
	</ul>

	<p>
	<div class="alert alert-warning" role="alert">
	  Adding Project Heads isn't available as of now.
	</div>

	<p>
  <h4>Project Tags</h4>
  <ul class="list-group">

  	<!-- list of tags -->
    @foreach($project->collaborators as $collaborator)
	  	<li class="list-group-item">
	  		<!-- form to add collaborator to the project -->
	  		<form class="form-inline" method="POST" action="/project/{{$project->project_id}}/remove-collaborator/{{$collaborator->user->user_id}}">
	  			{{ $collaborator->user->first_name }}&nbsp;
					{{ csrf_field() }}
					<button type="submit" class="btn btn-outline-danger">&times;</button>
				</form>
	  @endforeach

	  <!-- form to add tags -->
	  <li class="list-group-item">
	  	<form class="form-inline" method="POST" action="/project/{{$project->project_id}}/add-collaborator">
				{{ csrf_field() }}
			  <input class="form-control" type="text" id="user_id" name="user_id" placeholder="Add Collaborator">&nbsp;
			  <button class="btn btn-primary" type="submit">Add</button>
			</form>

	</ul>

	<p>
	<div class="alert alert-warning" role="alert">
	  To add a collaborator, input the "user_id" of the user for now. You can check their "user_id" by checking the database. This will be fixed in the future.
	</div>

	<p>
  <h4>Project Collaborators</h4>
  <ul class="list-group">

  	<!-- list of tags -->
    @foreach($project->tags as $proj_tags)
	  	<li class="list-group-item">
	  		<!-- form to delete collaborator to the project -->
	  		<form class="form-inline" method="POST" action="/project/{{$project->project_id}}/remove-tag/{{$proj_tags->tag->tag_id}}">
	  			{{ $proj_tags->tag->name }}&nbsp;
					{{ csrf_field() }}
					<button type="submit" class="btn btn-outline-danger">&times;</button>
				</form>
	  @endforeach

	  <!-- form to add tags -->
	  <li class="list-group-item">
	  	<form class="form-inline" method="POST" action="/project/{{$project->project_id}}/add-tag">
				{{ csrf_field() }}
			  <input class="form-control" type="text" id="tag_name" name="tag_name" placeholder="Add Tag">&nbsp;
			  <button class="btn btn-primary" type="submit">Add</button>
			</form>

	</ul>

	<p>
	<div class="alert alert-warning" role="alert">
	  To add a collaborator, input the "user_id" of the user for now. You can check their "user_id" by checking the database. This will be fixed in the future.
	</div>

</div>