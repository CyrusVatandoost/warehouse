@extends('layout.app')

@section('title', $project->name)
@section('page-title', $project->name)

@section('style')
  <style type="text/css">
  
    .hr-abstract {
      border: none;
      height: 1px;
      /* Set the hr color */
      color: #333; /* old IE */
      background-color: #333; /* Modern Browsers */
    }
    
    .project-badge{
      margin-bottom: 10px;
    }
    
</style>
@endsection

@section('modals')
  @include('modals.delete_project')
  @include('modals.project-archive')
@endsection

@section('left-sidenav')
  <p><a href="#modal-container-delete-project" role="button" class="btn btn-danger btn-block" data-toggle="modal">Delete Project</a></p>
  <p><a href="#modal-container-project-archive" role="button" class="btn btn-danger btn-block" data-toggle="modal">Archive Project</a></p>
	@endsection

@section('body')

  by:
  {{ $project->user->first_name }}
  {{ $project->user->last_name }}
  <br>
  Tags: 
  @foreach($project->tags as $something)
    <span class="badge badge-info">{{ $something->tag->name }}</span>
  @endforeach

  <br>
  
  @if($project->complete == 1)
    <span class="badge badge-success project-badge">Completed</span>
  @endif

  @if($project->complete == 0)
    <span class="badge badge-danger project-badge">Incomplete</span>
  @endif

  <div class="tabbable" id="tabs-463690">

    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link active" href="#panel-abstract" data-toggle="tab">Abstract</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#panel-files" data-toggle="tab">Files</a>
      </li>
      <li class="nav-item">
        <a class="nav-link"  href="#panel-progress" data-toggle="tab">Progress</a>
      </li>
      <li class="nav-item">
        <a class="nav-link"  href="#panel-issues" data-toggle="tab">Issues</a>
      </li>
      <li class="nav-item">
        <a class="nav-link"  href="#panel-settings" data-toggle="tab">Settings</a>
      </li>
    </ul>

    <div class="tab-content">
      @include('project.abstract')
      @include('project.files')
      @include('project.progress')
      @include('project.issues')
      @include('project.settings')
    </div>
    
  </div>

@endsection

<!-- right-sidenav -->
@section('right-sidenav')
  <!-- insert featured projects here -->
  @include('layout.right-sidenav')
@endsection