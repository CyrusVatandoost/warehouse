@extends('layout.app')

@section('title', $project->name)

<style type="text/css">
  hr {
    border: none;
    height: 1px;
    /* Set the hr color */
    color: #333; /* old IE */
    background-color: #333; /* Modern Browsers */
  }
</style>

@section('left-sidenav')
  <p><a href="#modal-container-delete-project" role="button" class="btn btn-danger btn-block" data-toggle="modal">Delete Project</a></p>
	@endsection

@section('body')

  @include('modals.delete_project')

  @if($project->complete == 1)
      <span class="badge badge-success">Completed</span>
  @endif

  @if($project->complete == 0)
    <span class="badge badge-danger">Incomplete</span>
  @endif

  <div class="tabbable" id="tabs-463690">

    <ul class="nav nav-tabs">
      <li class="active">
        <a class="btn" href="#panel-abstract" data-toggle="tab">Abstract</a>
      </li>
      <li>
        <a class="btn"  href="#panel-files" data-toggle="tab">Files</a>
      </li>
      <li>
        <a class="btn"  href="#panel-progress" data-toggle="tab">Progress</a>
      </li>
      <li>
        <a class="btn"  href="#panel-issues" data-toggle="tab">Issues</a>
      </li>
      <li>
        <a class="btn"  href="#panel-settings" data-toggle="tab">Settings</a>
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

@section('right-sidenav')
  <div class="card">
    <div class="card-body">
      Project Title
    </div>
  </div>
	@endsection