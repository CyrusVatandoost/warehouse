@extends('layout.app')

@section('title', 'Test Page')

@section('left-sidebar')
  <p><a href="#" class="btn btn-primary btn-block">New Announcement</a></p>
  <p><a href="#" class="btn btn-primary btn-block">New Project</a></p>
  <p><a href="#" class="btn btn-primary btn-block">New Project</a></p>
  <p><a href="#" class="btn btn-primary btn-block">New Project</a></p>
	@endsection

@section('body')
  <ul>
    @foreach ($tasks as $task)
      <li>{{ $task }}</li>
    @endforeach
  </ul>
	@endsection

@section('right-sidebar')
  <div class="well">
    <p>ADS/<p>
  </div>
  <div class="well">
    <p>ADS</p>
  </div>
	@endsection
