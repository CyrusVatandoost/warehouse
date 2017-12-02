<div class="tab-pane" id="panel-settings">
  <p>
    <h4>Project Heads</h4>
    <ul class="list-group">
		  <li class="list-group-item">Name Here</li>
		  <li class="list-group-item">
		  	<form class="form-inline">
				  <input type="text" class="form-control" id="inputPassword2" placeholder="Add Collaborator">
				  &nbsp
				  <button type="submit" class="btn btn-primary">Add</button>
				</form>
	  
		  </li>
		</ul>
  </p>
  <p>
    <h4>Project Collaborators</h4>
    <ul class="list-group">
      @foreach($project->collaborators as $collaborator)
		  	<li class="list-group-item">{{ $collaborator->user->first_name }}</li>
		  @endforeach
		  <li class="list-group-item">

		  	<form class="form-inline" method="POST" action="/project/{{$project->project_id}}/add-collaborator">
					{{ csrf_field() }}
				  <input type="text" id="user_id" name="user_id" placeholder="Add Collaborator">&nbsp

				  <button type="submit" class="btn btn-primary">Add</button>

				</form>

		  </li>
		</ul>
  </p>
</div>