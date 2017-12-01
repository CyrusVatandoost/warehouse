@extends('layout.app')

@if(Auth::check())
  @section('title', 'Home')
@endif

@if(!Auth::check())
  @section('title', 'Home')
@endif

<!-- left-sidenav -->
@section('left-sidenav')
  <p><a href="#" class="btn btn-primary btn-block">New Announcement</a></p>
  <p><a href="#modal-container-new-project" role="button" class="btn btn-primary btn-block" data-toggle="modal">New Project</a></p>
@endsection

<!-- body -->
@section('body')
  @include('modals.new_project')
  <!-- insert body here -->  
@endsection

<!-- right-sidenav -->
@section('right-sidenav')
  <div class="card">
    <div class="card-body">
      Project Title
    </div>
  </div>
  <br>
  <div class="card">
    <div class="card-body">
      Project Title
    </div>
  </div>
@endsection

