@extends('layout.app')

@section('title', 'Home')

@section('left-sidenav')
  <p><a href="#" class="btn btn-primary btn-block">New Announcement</a></p>
  <p><a href="#modal-container-new-project" role="button" class="btn btn-primary btn-block" data-toggle="modal">New Project</a></p>
  @endsection

@section('body')
  
  @include('modals.new_project')

  <a href="/sample">Boostrap 4.0 for WareHouse</a>

  @endsection

@section('right-sidenav')

  @endsection
