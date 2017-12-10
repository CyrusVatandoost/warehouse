<!-- DO NOT DELETE THIS FILE -->

<!-- this page follows this layout -->
<!-- i suggest make all new pages follow this layout -->
@extends('layout.app')

<!-- title at tab -->
@section('title', 'Admin')
<!-- title at body -->
@section('page-title', 'Admin')

<!-- css styles -->
@section('style')
	<!-- insert custom css styles here -->
	<!-- i suggest to avoid custom css styles and have it in the .css file in `public/css` -->
@endsection

<!-- modals -->
@section('modals')
	<!-- insert css styles here -->
  @include('modals.announcement-new')
  @include('modals.new_project')
@endsection

<!-- left-sidenav -->
@section('left-sidenav')
  <p><a href="#modal-container-new-announcement" role="button" class="btn btn-primary btn-block" data-toggle="modal">New Announcement</a></p>
  <p><a href="#modal-container-new-project" role="button" class="btn btn-primary btn-block" data-toggle="modal">New Project</a></p>
  <p><a href="#modal-container-select-featured-project/s" role="button" class="btn btn-primary btn-block" data-toggle="modal">Select Featured Project/s</a></p>
  <p><a href="/admin/archive" role="button" class="btn btn-primary btn-block">Archive</a></p>
@endsection

@section('body')
	
	<h4>Users:</h4>
	<div class="table-responsive">   
		<table class="table table-hover">
		    <thead class="thead-dark">
		      <tr>
		      	<th>User ID
				  	<th>First name
				  	<th>Middle Initial
				  	<th>Last Name
				  	<th>Email Address
		    </thead>
		    <tbody>
	@foreach($users as $user)
    <tr>
      <td>{{ $user->user_id }}
      <td>{{ $user->first_name }}
      <td>{{ $user->middle_initial }}
      <td>{{ $user->last_name }}
      <td>{{ $user->email }}
	@endforeach
			</tbody>
		</table>
	</div>

	<h4>Waitlist:</h4>
	<div class="table-responsive">   
		<table class="table table-hover">
		    <thead class="thead-dark">
		      <tr>
				  	<th>First name
				  	<th>Middle Initial
				  	<th>Last Name
				  	<th>Email Address
				  	<th>Action
		    </thead>
		    <tbody>
	@foreach($waitlists as $waitlist)
    <tr>
      <td>{{ $waitlist->first_name }}
      <td>{{ $waitlist->middle_initial }}
      <td>{{ $waitlist->last_name }}
      <td>{{ $waitlist->email }}
      <td><a href="admin/approve/{{ $waitlist->user_id }}/mail/{{ $waitlist->email }}" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-ok"></span> Approve</a>
	@endforeach
			</tbody>
		</table>
	</div>

	<h4>List of Admins:</h4>
	<div class="table-responsive">   
		<table class="table table-hover">
		    <thead class="thead-dark">
		      <tr>
				   <th>First name
				   <th>Last name
				   <th>Email
		    </thead>
		    <tbody>
		    	@foreach($admins as $admin)
			    	<tr>
			      	<td>{{ $admin->user->first_name }}
			      	<td>{{ $admin->user->last_name }}
			      	<td>{{ $admin->user->email }}
			    @endforeach
			    	<td>
			    	<td>
			    	<td>	
			</tbody>
		</table>
		<form class="form-inline" method="POST" action="/admin/store">
				{{ csrf_field() }}
			  <!-- Gets the "id" of the user as User has not been fully implemented yet to get Name -->
			  <h5>Add Admins:<h5>&nbsp; <!-- Add Admins -->
			  <input class="form-control" type="text" id="user_id" name="user_id" placeholder="User ID">&nbsp;
			  <!-- Gets the name of the new position -->
			  <button class="btn btn-primary" type="submit">Add</button>
			</form>
	</div>


	<h4>List of Projects:</h4>
		<div class="table-responsive">   
			<table class="table table-hover">
			    <thead class="thead-dark">
			      <tr>
					   <th>Project Name
					   <th>Date Created
					   <th>Date Updated
					   <th>
			    </thead>
			    <tbody>
					@foreach($projects as $project)
						<br>
				    	<tr>
				      	<td>{{ $project->name }}</td>
				      	<td>{{ $project->created_at}}</td>
				      	<td>{{ $project->updated_at}}</td>
				      	<td><a href="/project/{{$project->project_id}}"><button class="btn btn-primary" >View</button></a></td>
				    	</tr>
				    @endforeach
				</tbody>
			</table>
		</div>

	<h4>Project Archive:</h4>
		<div class="table-responsive">   
			<table class="table table-hover">
			    <thead class="thead-dark">
			      <tr>
					   <th>Project Name</th>
					   <th>Date Archived</th>
					   <th>button</th>
			       </tr>
			    </thead>
			    <tbody>
			  		@foreach($project_archives as $project)
				    <tr>
				      <td>{{$project->name}}</td>
				      <td>{{$project->updated_at}}</td>
				      <td><a href="/project/{{$project->project_id}}"><button class="btn btn-primary" >View</button></a></td>
				    </tr>
				    @endforeach
				</tbody>
			</table>
		</div>
	</p>
  
  
	<h4>Positions: </h4>
	<ul class="list-group">
  	
    @foreach($organization_positions as $position)
	  	<li class="list-group-item">
	  		<form class="form-inline" method="POST" action="/organization/{{$position->organization_position_id}}/remove-position">
	  			{{ $position->name }}&nbsp;
				{{ csrf_field() }}
				<button type="submit" class="btn btn-outline-danger">&times;</button>
			</form>
	  @endforeach

	  <!-- form to add positions -->
	  <li class="list-group-item">
	  	<form class="form-inline" method="POST" action="/organization/add-position">
				{{ csrf_field() }}
			  <!-- Gets the "id" of the organization as Organization has not been fully implemented yet to get Name -->
			  <input class="form-control" type="text" id="tag_name" name="organization_id" placeholder="Organization ID">&nbsp;
			  <!-- Gets the name of the new position -->
			  <input class="form-control" type="text" id="tag_name" name="position" placeholder="Position">&nbsp;

			  <button class="btn btn-primary" type="submit">Add</button>
			</form>
	</ul>

	<p>
	<div class="alert alert-warning" role="alert">
	  To add a position, input the "organization_id" of the organization for now. You can check their "organization_id" by checking the database. This will be fixed in the future.
	</div>
	<br>

  @endsection

<!-- right-sidenav -->
@section('right-sidenav')
  <!-- insert featured projects here -->
  @include('layout.right-sidenav') <!-- you can remove this if you do not want the featured projects to be shown -->
@endsection