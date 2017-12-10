<!-- DO NOT DELETE THIS FILE -->

<!-- this page follows this layout -->
<!-- i suggest make all new pages follow this layout -->
@extends('layout.app')

<!-- title at tab -->
@section('title', 'Projects')
<!-- title at body -->
@section('page-title', 'Projects')

<!-- css styles -->
@section('style')
	<!-- insert custom css styles here -->
	<!-- i suggest to avoid custom css styles and have it in the .css file in `public/css` -->
@endsection

<!-- modals -->
@section('modals')
	<!-- insert css styles here -->
  @include('modals.new_project')
@endsection

<!-- left-sidenav -->
@section('left-sidenav')

@endsection

<!-- body -->
@section('body')

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
			    	<tr>
			      	<td><a href="/project/{{$project->project_id}}">{{ $project->name }}</a></td>
			      	<td>{{ $project->created_at}}</td>
			      	<td>{{ $project->updated_at}}</td>
			      	<td><a href="/project/{{$project->project_id}}/feature" class="btn btn-primary">Feature
			    	</tr>
			    @endforeach
			</tbody>
		</table>
	</div>

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
					@foreach($featured_projects as $featured_project)
			    	<tr>
			      	<td><a href="/project/{{$featured_project->project_id}}">{{ $featured_project->project->name }}</a></td>
			      	<td>{{ $featured_project->created_at}}</td>
			      	<td>{{ $featured_project->updated_at}}</td>
			      	<td><a href="/project/{{$featured_project->project_id}}/unfeature" class="btn btn-danger">Remove
			    	</tr>
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