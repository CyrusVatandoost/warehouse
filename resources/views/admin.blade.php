<!-- DO NOT DELETE THIS FILE -->

<!-- this page follows this layout -->
<!-- i suggest make all new pages follow this layout -->
@extends('layout.app')

<!-- title at tab -->
@section('title', 'Admin Dashboard')
<!-- title at body -->
@section('page-title', 'Admin Dashboard')

<!-- css styles -->
@section('style')
	<!-- insert custom css styles here -->
	<!-- i suggest to avoid custom css styles and have it in the .css file in `public/css` -->
@endsection

<!-- modals -->
@section('modals')
  @include('modals.announcement-new')
  @include('modals.new_project')
@endsection

<!-- left-sidenav -->
@section('left-sidenav')
  <p><a href="/admin/users" role="button" class="btn btn-primary btn-block">User Dashboard</a></p>
  <p><a href="/admin/projects" role="button" class="btn btn-primary btn-block">Project Dashboard</a></p>
  <p><a href="/admin/organization" role="button" class="btn btn-primary btn-block">Organization Dashboard</a></p>
  <p><a href="/admin/file-archive" role="button" class="btn btn-primary btn-block">File Archive</a></p>
  <p><a href="/admin/logs" class="btn btn-primary btn-block">View Logs</a></p>
@endsection

@section('body')

  <div class="row">

    <div class="col-sm">
    	<p>
    		<div class="card-deck">

		    	<div class="card">
		    		<h4 class="card-header">Users</h4>
					  <div class="card-body">
					    <p class="card-text">
					    	Users: {{ $users->count() }}<br>
					    	<!-- need to update number of active users -->
					    	Active users: {{ $users->count() }}
					    </p>
					    <a href="/admin/users" role="button" class="btn btn-primary">Dashboard</a>
					  </div>
					</div>

					<div class="card">
		    		<h4 class="card-header">Projects</h4>
					  <div class="card-body">
					    <p class="card-text">
					    	Projects: {{ $projects->count() }}<br>
					    	Completed projects: {{ $projects->where('completed', 1)->count() }}<br>
					    	Inprogress projects: {{ $projects->where('completed', 0)->count() }}<br>
					    	Public projects: {{ $projects->where('public', 1)->count() }}<br>
					    	Private projects: {{ $projects->where('public', 0)->count() }}<br>
					    </p>
								<a href="/admin/projects" role="button" class="btn btn-primary">Dashboard</a>
					  </div>
					</div>

					<div class="card">
		    		<h4 class="card-header">Organization</h4>
					  <div class="card-body">
					    <p class="card-text">
					    	Name: {{ $organization->name }}<br>
					    	Email: {{ $organization->email}}
					    </p>
								<a href="/admin/organization" role="button" class="btn btn-primary">Dashboard</a>
					  </div>
					</div>

				</div>

			</p>
    </div>

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
						<td><a style="margin-right: 7px;" href="admin/approve/{{ $waitlist->user_id }}/mail/{{ $waitlist->email }}" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-ok"></span> Approve</a><a href="admin/disapprove/{{ $waitlist->user_id }}/mail/{{ $waitlist->email }}" class="btn btn-sm btn-danger">Disapprove</a>
				@endforeach
			</tbody>
		</table>
	</div>

@endsection

<!-- right-sidenav -->
@section('right-sidenav')
  <!-- insert featured projects here -->
  @include('layout.right-sidenav') <!-- you can remove this if you do not want the featured projects to be shown -->
@endsection