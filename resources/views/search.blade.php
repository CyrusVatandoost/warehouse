@extends('layout.app')

<!-- if logged in -->
@if(Auth::check())
  @section('title', 'Search')
@endif

<!-- if guest -->
@if(!Auth::check())
  @section('title', 'Search')
@endif

<!-- left sidenav -->
@section('left-sidenav')
  <p><a href="#" class="btn btn-primary btn-block">New Announcement</a></p>
@endsection

<!-- body -->
@section('body')
  
@endsection

<!-- right sidenav -->
@section('right-sidenav')

@endsection
