<!-- follows this layout -->
@extends('layout.app')

<!-- title at tab -->
@section('title', 'Sample')
<!-- title at body -->
@section('page-title', 'Sample')

<!-- add modals here -->
@section('modals')
  @include('modals.new_project')
@endsection

<!-- left-sidenav -->
@section('left-sidenav')
  <p><a href="#" class="btn btn-primary btn-block">New Announcement</a></p>
  <p><a href="#modal-container-new-project" role="button" class="btn btn-primary btn-block" data-toggle="modal">New Project</a></p>
@endsection

<!-- body -->
@section('body')
  <!-- insert body here -->  
@endsection

<!-- right-sidenav -->
@section('right-sidenav')
  <!-- insert featured projects here -->
  @include('layout.right-sidenav')
@endsection
