	<style type="text/css">
.custom-checkbox {
  min-height: 1rem;
  padding-left: 0;
  margin-right: 0;
  cursor: pointer; 
}
  .custom-checkbox .custom-control-indicator {
    content: "";
    display: inline-block;
    position: relative;
    width: 30px;
    height: 10px;
    background-color: #818181;
    border-radius: 15px;
    margin-right: 10px;
    -webkit-transition: background .3s ease;
    transition: background .3s ease;
    vertical-align: middle;
    margin: 0 16px;
    box-shadow: none; 
  }
    .custom-checkbox .custom-control-indicator:after {
      content: "";
      position: absolute;
      display: inline-block;
      width: 18px;
      height: 18px;
      background-color: #f1f1f1;
      border-radius: 21px;
      box-shadow: 0 1px 3px 1px rgba(0, 0, 0, 0.4);
      left: -2px;
      top: -4px;
      -webkit-transition: left .3s ease, background .3s ease, box-shadow .1s ease;
      transition: left .3s ease, background .3s ease, box-shadow .1s ease; 
    }
  .custom-checkbox .custom-control-input:checked ~ .custom-control-indicator {
    background-color: #84c7c1;
    background-image: none;
    box-shadow: none !important; 
  }
    .custom-checkbox .custom-control-input:checked ~ .custom-control-indicator:after {
      background-color: #84c7c1;
      left: 15px; 
    }
  .custom-checkbox .custom-control-input:focus ~ .custom-control-indicator {
    box-shadow: none !important; 
  }
	</style>

	<div class="tab-pane" id="panel-settings">


	<div class="row">
	  <div class="col-lg-5">

			<p>
		  <h4>Project Name</h4>

		  <!-- form to change project name -->
			<form class="form-inline" method="POST" action="/project/{{$project->project_id}}/change-name">
				{{ csrf_field() }}
				<input class="form-control" type="text" name="name" placeholder="{{$project->name}}">&nbsp;
			  <button type="submit" class="btn btn-primary">Change Name</button>
			</form>

	  </div>

	  <div class="col-lg-5">

	      <p>
		  <h4>Project Visibility</h4>
			<!-- dropdown button to change project status -->
			 <div class='row'>
		     	<div class="col-sm-1"></div>
		     	<div class="col-sm-1">Public</div>
            	<div class="col-sm-2">
		    	<label class="custom-control custom-checkbox">
			    @if( $project->public == 1 )
                	<input type="checkbox" class="custom-control-input" onchange="document.location.replace('/project/{{$project->project_id}}/change-visibility')" />
	                   
			    @endif

			    @if( $project->public == 0 )
			    	<input type="checkbox" class="custom-control-input" onchange="document.location.replace('/project/{{$project->project_id}}/change-visibility')" checked/>
			    @endif
		         <span class="custom-control-indicator"></span>
                    </label>
            	</div>
            	<div class="col-sm-1">Private</div>
            	<div class="col-sm-7"></div>
            </div>
	  </div>
	</div>

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
  <h4>Project Collaborators</h4>
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
  <h4>Project Tags</h4>
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
