	<style type="text/css">

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

	  <!-- form to change project visibility -->
		<div class="col-lg-5">
			<p>
			<h4>Project Visibility</h4>
			<div class='row'>
				<div class="col-sm-2">Public</div>
				<div class="col-sm-2">
					<label class="custom-control custom-checkbox">
						@if( $project->public == 1 )
							<input type="checkbox" class="custom-control-input" onchange="document.location.replace('/project/{{$project->project_id}}/change-visibility')"/>
						@else
							<input type="checkbox" class="custom-control-input" onchange="document.location.replace('/project/{{$project->project_id}}/change-visibility')" checked/>
						@endif
						<span class="custom-control-indicator"></span>
					</label>
				</div>
				<div class="col">Private</div>
			</div>
		</div>

	</div>

	<!--form to change project description -->
	<br>
	<h4>Description</h4>
	<form method="POST" action="/project/{{$project->project_id}}/update-description">
		{{ csrf_field() }}
		<textarea name="description" cols="50" rows="5">{{ $project->description }}</textarea><br>
		<button type="submit" class="btn btn-primary">Update Description</button>
	</form>

	<!-- form to update project banner -->
	<br>
	<h4>Banner</h4>
	<div class="form-group">
		@if (file_exists(public_path('/uploads/'.$project->project_id.'/banner.jpg')))
			<img src="{{ asset('/uploads/'.$project->project_id.'/banner.jpg') }}">
		@else
			<img src="{{ asset('/uploads/defaults/banner.jpg') }}">
		@endif
	</div>

	<form method="POST" action="/project/{{$project->project_id}}/banner-update" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="form-group">
			<input type="file" class="form-control-file" name="file">
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary">Update Banner</button>
		</div>
	</form>

	<br>
  <h4>Project Heads</h4>
  <ul class="list-group">
  	<!-- list of heads -->
    @foreach($project->heads as $head)
	  	<li class="list-group-item">
	  		<!-- form to add head to the project -->
	  		<form class="form-inline" method="POST" action="/project/{{$project->project_id}}/head-remove/{{$head->user_id}}">
	  			{{ $head->user->first_name }}&nbsp;
					{{ csrf_field() }}
					<button type="submit" class="btn btn-outline-danger">&times;</button>
				</form>
	  @endforeach
	  <li class="list-group-item">
	  	<form class="form-inline" method="POST" action="/project/{{$project->project_id}}/head-add">
	  		{{ csrf_field() }}
			  <input type="text" class="form-control" name="user_id" placeholder="Add Project Head">
			  &nbsp;
			  <button type="submit" class="btn btn-primary">Add</button>
			</form>
	</ul>

	<br>
  <h4>Collaborators</h4>
  <ul class="list-group">
  	<!-- list of collaborators -->
    @foreach($project->collaborators as $collaborator)
	  	<li class="list-group-item">
	  		<!-- form to add collaborator to the project -->
	  		<form class="form-inline" method="POST" action="/project/{{$project->project_id}}/remove-collaborator/{{$collaborator->user_id}}">
	  			{{ $collaborator->user->first_name }}&nbsp;
					{{ csrf_field() }}
					<button type="submit" class="btn btn-outline-danger">&times;</button>
				</form>
	  @endforeach
	  <!-- form to add collaborators -->
	  <li class="list-group-item">
	  	<form id="collab-form" class="form-inline" method="POST" action="/project/{{$project->project_id}}/add-collaborator">
				{{ csrf_field() }}
			  <input class="form-control" id="user_id" name="user_id" type="text" placeholder="Add Collaborator">&nbsp;
			  <button onclick="sendCollaboratorPost()" class="btn btn-primary" type="button">Add</button>
			</form>
	</ul>

	<br>
	<div class="alert alert-danger" role="alert">
	  To add a collaborator, type the name of the user and click on the suggestion from the dropdown.
	</div>

	<br>
  <h4>Project Tags</h4>
  <ul class="list-group">

  	<!-- list of tags -->
    @foreach($project->tags as $proj_tags)
	  	<li class="list-group-item">
	  		<!-- form to delete tags from the project -->
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

	<br>
	<div class="alert alert-warning" role="alert">
	  To add a tag, input any tag you prefer or select a suggested tag.
	</div>

	<br>
   <a href="#modal-container-project-archive" class="btn btn-danger" role="button" data-toggle="modal">Archive Project</a>

</div>

@section('scripts')
	<script>
	var collaboratorID = "null";

	//Send POST for add collaborator
	function sendCollaboratorPost(){
		var form = document.getElementById("collab-form");
		var input = document.getElementById("user_id");
		if(collaboratorID != "null"){
			input.style.color = '#fff';
			input.value = collaboratorID;
			form.submit();
		}
	}

	//Autocomplete script
	var users = {
	  url: "/user/autocomplete",
	  getValue: function(element) {
	    if(element.email != "{{ auth()->user()->email }}"){
	      if(element.last_name == "last_name"){
	        return element.first_name+" ";
	      }
	      else{
	        return element.first_name+" "+element.last_name;
	      }
	    }
	    else{
	      return "No user";
	    }

	  },
	  list: {
	    match: {
	      enabled:true
	    },
	    showAnimation: {
	      type: "slide", //normal|slide|fade
	      time: 400,
	      callback: function() {}
	    },
	    hideAnimation: {
	      type: "slide", //normal|slide|fade
	      time: 400,
	      callback: function() {}
	    },
	    onClickEvent: function() {
	      collaboratorID = $("#user_id").getSelectedItemData().user_id;
	    }
	  }
	};

	$("#user_id").easyAutocomplete(users);
	</script>
@stop
