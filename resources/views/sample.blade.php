@extends('layout.app')

@section('title', 'Sample')

@section('left-sidenav')
  <button type="button" class="btn btn-primary btn-block">Primary</button>
  <button type="button" class="btn btn-primary btn-block">Primary</button>
  @endsection

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