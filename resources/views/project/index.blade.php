<!-- DO NOT DELETE THIS FILE -->

<!-- this page follows this layout -->
<!-- i suggest make all new pages follow this layout -->
@extends('layout.app')

<!-- title at tab -->
@section('title', 'Project')
<!-- title at body -->

<!-- css styles -->
@section('style')
	<!-- insert custom css styles here -->
	<!-- i suggest to avoid custom css styles and have it in the .css file in `public/css` -->
@endsection

<!-- modals -->
@section('modals')
	<!-- insert css styles here -->
  @include('modals.project-archive')
@endsection

<!-- left-sidenav -->
@section('left-sidenav')

@endsection

<!-- body -->
@section('body')
  <!-- insert body here -->

  <div class="card w-100">
    <div class="card-header">
      <h1>{{ $project->name }}</h1>

      {{ $project->user->first_name }} {{ $project->user->middle_initial }} {{ $project->user->last_name }}
      <br>
      <!-- project status -->
      @if($project->complete == 1)
        <span class="badge badge-success project-badge">Completed</span>
      @else
        <span class="badge badge-danger project-badge">Incomplete</span>
      @endif

      <!-- project tags -->
      @foreach($project->tags as $something)
        <span class="badge badge-info">{{ $something->tag->name }}</span>
      @endforeach

    </div>
    <div class="card-body">
      {{ $project->description }}
    </div>
  </div>
  <br>
  <div class="card w-100">
    <div class="card-body">

      <div class="tabbable">

        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link nav-link-tabs active" href="#panel-abstract" data-toggle="tab">Abstract</a>
          </li>
          @if($project->collaborators->contains('user_id', Auth::id()) || $project->user_id == auth()->id() || $project->heads->contains('user_id', Auth::id()))
          <li class="nav-item">
            <a class="nav-link nav-link-tabs" href="#panel-files" data-toggle="tab">Files</a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-tabs"  href="#panel-progress" data-toggle="tab">Progress</a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-tabs"  href="#panel-issues" data-toggle="tab">Issues</a>
          </li>
          @endif
          @if($project->user_id == auth()->id() || $project->heads->contains('user_id', Auth::id()))
          <li class="nav-item">
            <a class="nav-link nav-link-tabs"  href="#panel-settings" data-toggle="tab">Settings</a>
          </li>
          @endif
        </ul>

        <div class="tab-content">
          @include('project.abstract')
          @if (!$project->collaborators->contains('user_id', Auth::id()))
            @include('project.files')
            @include('project.progress')
            @include('project.issues')
            @include('project.settings')
          @endif 
          @if(Auth::check())
          @endif
        </div>

      </div>

    </div>
  </div>
@endsection

<!-- right-sidenav -->
@section('right-sidenav')
  <!-- insert featured projects here -->
  @include('layout.right-sidenav') <!-- you can remove this if you do not want the featured projects to be shown -->
@endsection

@section('scripts')
	<!-- insert scripts here -->
@endsection