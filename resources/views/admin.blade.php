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
  <p><a href="#modal-container-delete-account" role="button" class="btn btn-primary btn-block" data-toggle="modal">Delete an Account</a></p>
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
	<br>

	<h4>List of Admins:</h4>
	@foreach($admins as $admin)
		{{ $admin }}<br>
	@endforeach
	<br>

	<p>
		<div class="table-responsive">   
			<table class="table table-hover">
			    <thead class="thead-dark">
			      <tr>
					   <th>First name</th>
					   <th>Last name</th>
					   <th>Email</th>
			       </tr>
			    </thead>
			    <tbody>
				    <tr>
				      <td>sa</td>
				      <td>mp</td>
				      <td>le</td>
				    </tr>
				    <tr>
				      <td>sa</td>
				      <td>mp</td>
				      <td>le</td>
				    </tr>
				    <tr>
				      <td>sa</td>
				      <td>mp</td>
				      <td>le</td>
				    </tr>
				</tbody>
			</table>
		</div>
	</p>

	<h4>List of Projects:</h4>
	@foreach($projects as $project)
		{{ $project }}<br>
	@endforeach
	<br>

<p>
		<div class="table-responsive">   
			<table class="table table-hover">
			    <thead class="thead-dark">
			      <tr>
					   <th>Project Name</th>
					   <th>Date Created</th>
					   <th>button</th>
			       </tr>
			    </thead>
			    <tbody>
				    <tr>
				      <td>sa</td>
				      <td>mp</td>
				      <td>le</td>
				    </tr>
				    <tr>
				      <td>sa</td>
				      <td>mp</td>
				      <td>le</td>
				    </tr>
				    <tr>
				      <td>sa</td>
				      <td>mp</td>
				      <td>le</td>
				    </tr>
				</tbody>
			</table>
		</div>
	</p>

	<h4>Project Archive:</h4>
	@foreach($project_archives as $project)
		{{ $project }}<br>
	@endforeach
	<br>
  
	<p>
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
				    <tr>
				      <td>sa</td>
				      <td>mp</td>
				      <td>le</td>
				    </tr>
				    <tr>
				      <td>sa</td>
				      <td>mp</td>
				      <td>le</td>
				    </tr>
				    <tr>
				      <td>sa</td>
				      <td>mp</td>
				      <td>le</td>
				    </tr>
				</tbody>
			</table>
		</div>
	</p>
  
  
	<h4>Positions: </h4>

	<ul class="list-group">

  <!-- list of tags -->
    @foreach($organization_positions as $position)
	  	<li class="list-group-item">
	  		<form class="form-inline" method="POST" action="/organization/{{$position->organization_position_id}}/remove-position">
	  			{{ $position->name }}&nbsp;
				{{ csrf_field() }}
				<button type="submit" class="btn btn-outline-danger">&times;</button>
			</form>
	  @endforeach

	  <!-- form to add tags -->
	  <li class="list-group-item">
	  	<form class="form-inline" method="POST" action="/organization/add-position">
				{{ csrf_field() }}
			  <input class="form-control" type="text" id="tag_name" name="organization_id" placeholder="Organization ID">&nbsp;			<!-- Gets the "id" of the organization as Organization has not been fully implemented yet to get Name -->
			  <input class="form-control" type="text" id="tag_name" name="position" placeholder="Position">&nbsp; <!-- Gets the name of the new position -->

			  <button class="btn btn-primary" type="submit">Add</button>
			</form>
	</ul>

	<p>
	<div class="alert alert-warning" role="alert">
	  To add a position, input the "organization_id" of the organization for now. You can check their "organization_id" by checking the database. This will be fixed in the future.
	</div>

	<h4>File Archive:</h4>
	@foreach($file_archives as $file)
		{{ $file }}<br>
	@endforeach
	<br>

  @endsection

<!-- right-sidenav -->
@section('right-sidenav')
  <!-- insert featured projects here -->
  @include('layout.right-sidenav') <!-- you can remove this if you do not want the featured projects to be shown -->
@endsection