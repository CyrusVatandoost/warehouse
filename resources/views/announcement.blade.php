<!-- this page follows this layout -->
@extends('layout.app')

<!-- title at tab -->
@section('title', 'Announcement')
<!-- title at body -->
@section('page-title', 'Announcement')

<!-- css styles -->
@section('style')
	<!-- insert css styles here -->
  <style type="text/css">
    h1.blue {
      color:#0066ff;
    }
  </style>
@endsection

<!-- modals -->
@section('modals')
	<!-- insert css styles here -->
  @include('modals.new_project')  
  @include('modals.announcement-new')
  @include('modals.announcement-delete')
@endsection

<!-- left-sidenav -->
@section('left-sidenav')
  <p><a href="#modal-container-delete-announcement" role="button" class="btn btn-danger btn-block" data-toggle="modal">Delete Announcement</a></p>
  <p><a href="#modal-container-new-announcement" class="btn btn-primary btn-block" role="button" data-toggle="modal">New Announcement</a></p>
  <p><a href="#modal-container-new-project" role="button" class="btn btn-primary btn-block" data-toggle="modal">New Project</a></p>
@endsection

<!-- body -->
@section('body')
  <!-- insert body here -->  
  <br>
    <div class="container">
      <div class="row"> 
        <div class="col-lg-12"> 
        
            <h1 class="display-3 | blue">{{ $announcement->name }}</h1>

            <p class="display-12">Posted {{ $announcement->created_at->diffForHumans() }} by {{ $announcement->user->first_name}} {{ $announcement->user->last_name }} (Expires on {{ $announcement->expires_on }})</p>

	        <div class="jumbotron">
	            <p class="lead"> {{ $announcement->description }} </p>
	        </div>
        </div>
      </div>
    </div>
@endsection

<!-- right-sidenav -->
@section('right-sidenav')
  <!-- insert featured projects here -->
  @include('layout.right-sidenav')
@endsection
