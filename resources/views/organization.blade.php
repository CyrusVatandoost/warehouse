@extends('layout.app')

@section('title', 'Organization')

@section('modals')
  @include('modals.new_project')
@endsection

<!-- left-sidenav -->
@section('left-sidenav')
  <p><a href="#" class="btn btn-announcement btn-block">New Announcement</a></p>
  <p><a href="#modal-container-new-project" role="button" class="btn btn-project btn-block" data-toggle="modal">New Project</a></p>
@endsection

<!-- body -->
@section('body')
  @include('modals.new_project')
  <!-- insert body here -->  
@endsection

<!-- right-sidenav -->
@section('right-sidenav')
  <!-- insert featured projects here -->
  @include('layout.right-sidenav')
@endsection
