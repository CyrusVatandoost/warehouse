<!-- DO NOT DELETE THIS FILE -->

<!-- this page follows this layout -->
<!-- i suggest make all new pages follow this layout -->
@extends('layout.app')

<!-- title at tab -->
@section('title', 'Logs')
<!-- title at body -->
@section('page-title', 'Site Logs')

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
  <p><a href="/admin" class="btn btn-primary btn-block">Back to Dashboard</a></p>
@endsection

<!-- body -->
@section('body')

  <h5>A list of all actions by all accounts</h5>
  <br> 

	<!-- <div class="table-responsive">   
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
	
			</tbody>
		</table>
	</div> -->

	@foreach($logs as $log) 
		<tr>
	      <td>{{ $log->user_id }}
	      <td>{{ $log->user_action }}
	      <td>{{ $log->action_details }}
	      <td>{{ $log->created_at }}
	@endforeach

@endsection

<!-- right-sidenav -->
@section('right-sidenav')
  <!-- insert featured projects here -->
  @include('layout.right-sidenav') <!-- you can remove this if you do not want the featured projects to be shown -->
@endsection