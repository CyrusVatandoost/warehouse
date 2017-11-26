@extends('oldlayout.app')

@section('title', $project->name)

@section('left-sidebar')
  <p><a href="#modal-container-delete-project" role="button" class="btn btn-danger btn-block" data-toggle="modal">Delete Project</a></p>
	@endsection

@section('body')

  <div class="tabbable" id="tabs-463690">
    <ul class="nav nav-tabs">
      <li class="active">
        <a href="#panel-abstract" data-toggle="tab">Abstract</a>
      </li>
      <li>
        <a href="#panel-files" data-toggle="tab">Files</a>
      </li>
      <li>
        <a href="#panel-progress" data-toggle="tab">Progress</a>
      </li>
      <li>
        <a href="#panel-issues" data-toggle="tab">Issues</a>
      </li>
      <li>
        <a href="#panel-settings" data-toggle="tab">Settings</a>
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

@section('right-sidebar')
  <div class="well">
    <p>ADS</p>
  </div>

  <div class="well">
    <p>ADS</p>
  </div>

	@endsection

@include('modals.delete_project')