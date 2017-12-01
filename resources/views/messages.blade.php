@extends('layout.app')

@if(Auth::check())
  @section('title', 'Home')
@endif

@if(!Auth::check())
  @section('title', 'Home')
@endif

@section('left-sidenav')
  <p><a href="#" class="btn btn-primary btn-block">New Announcement</a></p>
  <p><a href="#modal-container-new-project" role="button" class="btn btn-primary btn-block" data-toggle="modal">New Project</a></p>
@endsection

@section('body')

  @include('modals.new_project')
  
@endsection

@section('right-sidenav')

@endsection