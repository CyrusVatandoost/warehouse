<!-- DO NOT DELETE THIS FILE -->

<!-- this page follows this layout -->
<!-- i suggest make all new pages follow this layout -->
@extends('layout.app')

<!-- title at tab -->
@section('title', 'Organization Dashboard')
<!-- title at body -->
@section('page-title', 'Organization Dashboard')

<!-- css styles -->
@section('style')
	<!-- insert custom css styles here -->
	<!-- i suggest to avoid custom css styles and have it in the .css file in `public/css` -->
@endsection

<!-- modals -->
@section('modals')
	<!-- insert css styles here -->
  @include('modals.project-new')
@endsection

<!-- left-sidenav -->
@section('left-sidenav')
  <p><a href="/admin" class="btn btn-primary btn-block">Back to Dashboard</a></p>
@endsection

<!-- body -->
@section('body')

	<div class="card">
		<div class="card-header">
			Organization Details 
		</div>
		<div class="card-body">
			<form method="POST" action="/organization/{{$organization->organization_id}}/details-update">
				{{ csrf_field() }}
				<label>Organization Name</label>
			  <div class="input-group">
				  <input type="text" class="form-control" placeholder="Organization Name" aria-label="Username" aria-describedby="basic-addon1" name="name" value="{{$organization->name}}">
				</div>
				<br>
				<label>Organization Email</label>
			  <div class="input-group">
				  <input type="text" class="form-control" placeholder="Organization Email" aria-label="Username" aria-describedby="basic-addon1" name="email" value="{{$organization->email}}">
				</div>
				<br>
			  <div class="input-group">
					<button class="btn btn-primary" type="submit">Update</button>
			  </div>
			</form>
		</div>
	</div>

	<br>
	<div class="card">
		<div class="card-header">
  		List of Admins
  	</div>
  	<div class="card-body">
  		<ul class="list-group list-group-flush">
		    @foreach($admins as $admin)
			  	<li class="list-group-item">
			  		<div class="row">
				  		<form class="form-inline" method="POST" action="/admin/remove/{{$admin->admin_id}}">
								{{ csrf_field() }}
								<div class="col">
			  					{{ $admin->user->first_name}}
			  				</div>
			  				<div class="col">
									<button type="submit" class="btn btn-outline-danger rounded-circle">&times;</button>
								</div>
							</form>
						</div>
				@endforeach
			</ul>
		</div>
		<div class="card-footer">
			<form class="form-inline" method="POST" action="/admin/store">
				{{ csrf_field() }}
			  <!-- Gets the "id" of the user as User has not been fully implemented yet to get Name -->
			  <h5>Add Admins:<h5>&nbsp; <!-- Add Admins -->
			  <input class="form-control" type="text" id="user_id" name="user_id" placeholder="User ID">&nbsp;
			  <!-- Gets the name of the new position -->
			  <button class="btn btn-primary" type="submit">Add</button>
			</form>
		</div>
	</div>

	<br>

	<h4>Positions: </h4>
	<ul class="list-group">
  	
  	<!-- form: position remove -->
    @foreach($organization_positions as $position)
	  	<li class="list-group-item">
	  		<form class="form-inline" method="POST" action="/organization/{{$position->organization_position_id}}/remove-position">
	  			{{ $position->name }}&nbsp;
				{{ csrf_field() }}
				<button type="submit" class="btn btn-outline-danger rounded-circle">&times;</button>
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

	<!-- Assigning Positions to Users -->
	<h4>Assign Positions: </h4>
	<ul class="list-group">

    @foreach($organization_position_users as $employee)
	  	<li class="list-group-item">
	  		<form class="form-inline" method="POST" action="/admin/{{$employee->organization_position_user_id}}/delete-user-position">
				{{ csrf_field() }}
	  			{{$employee->role['first_name']}}&nbsp;{{$employee->role['last_name']}}&nbsp;&nbsp;  {{$employee->position['name']}}&nbsp;&nbsp;&nbsp;&nbsp;
				<button type="submit" class="btn btn-outline-danger">&times;</button>
			</form>
	  @endforeach

	  <!-- form to add positions -->
	  <li class="list-group-item">
	  	<form class="form-inline" method="POST" action="/admin/assign-user-position">
				{{ csrf_field() }}
			  <!-- Gets the "id" of the organization as Organization has not been fully implemented yet to get Name -->
			  <input class="form-control" type="text" id="user_id" name="user_id" placeholder="User ID">&nbsp;
			  <!-- Gets the name of the new position -->
			  <input class="form-control" type="text" id="position_id" name="position_id" placeholder="Position ID">&nbsp;

			  <button class="btn btn-primary" type="submit">Add</button>
			</form>
	</ul>

@endsection

<!-- right-sidenav -->
@section('right-sidenav')
  <!-- insert featured projects here -->
  @include('layout.right-sidenav') <!-- you can remove this if you do not want the featured projects to be shown -->
@endsection

@section('scripts')
	<!-- insert scripts here -->
@endsection