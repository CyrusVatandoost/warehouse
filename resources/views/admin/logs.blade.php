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
	<style>
		
	</style>
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

  <h5>A list of all actions performed by all accounts</h5>
  <br> 

	<div class="table-responsive">   
		<table class="table table-hover">
			<thead class="thead-dark">
		      <tr>
				  	<th>Date 
				  	<th>Log
		    </thead>
		    <tbody>
				@foreach($logs as $log) 
					<tr>
					  <td>{{ $log->created_at }}

				      <td>
				      @foreach($users as $user) 
				      	@if($user->user_id == $log->user_id)
				      		{{ $user->first_name }} 
				      		{{ $user->last_name }}
				      	@endif
				      @endforeach 
				      {{ $log->user_action }}: {{ $log->action_details }}

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