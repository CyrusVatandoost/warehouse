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
  @include('modals.new_announcement')
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
	
	<h4>List of Users:</h4>
	@foreach($users as $user)
		{{ $user }}<br>
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