@extends('oldlayout.app')

@section('title', 'Home')

@section('left-sidebar')
  <p><a href="#" class="btn btn-primary btn-block">New Announcement</a></p>
  <p><a href="#modal-container-new-project" role="button" class="btn btn-primary btn-block" data-toggle="modal">New Project</a></p>
  @endsection

@section('body')

  @include('modals.new_project')
  
  <p>Hello, World

  <p><a href="/sample">Boostrap 4.0 for WareHouse</a>

  @endsection

@section('right-sidebar')
  <div class="well">
    <p>ADS</p>
  </div>

  <div class="well">
    <p>ADS</p>
  </div>

  @endsection
