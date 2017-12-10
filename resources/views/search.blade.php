<!-- follows this layout -->
@extends('layout.app')

<!-- title at tab -->
@section('title', 'Search')
<!-- title at body -->


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
<h1>Search results for "{{ @$searched }}"</h1>
 <div class="tab-pane" id="panel-all_projects">
        <p>
          <div class="container-fluid">
            <div class="row projects-no-gutters align-items-start">
              @foreach($projects as $project)
                <div class="col-md-auto">
                <div class="card projects-card-size">
                <div class="card-block">
                  <h4 class="card-header bg-dark" style="padding-left: 10px;">
                    <a class="text-white" href="{{ url('project') }}/{{ $project->pID }}">
                      {{ $project->pName }}
                    </a>
                    <div class="float-right small">
                        @if($project->public == 1)
                          <span class="badge badge-success">
                            <i class="material-icons material-icons-md">lock_open</i>
                          </span>
                        @endif

                        @if($project->public == 0)
                          <span class="badge badge-danger">
                            <i class="material-icons material-icons-md">lock_outline</i>
                          </span>
                        @endif
                      
                    </div>
                  </h4>
                  <div class="image">
                    <a class="projects-link" href="{{ url('project') }}/{{ $project->pID}}">
                      <img src="http://lorempixel.com/output/people-q-c-600-200-1.jpg" class="img-thumbnail" alt="avatar" style="margin-top: 20px; margin-bottom: 20px;"/>
                    </a>
                  </div>
                  <div class="card-body">
                    <p class="card-text">{{ $project->description }}</p>
                  </div>
                  <div class="row">
                    <div class="col text-center small p-2">
                      <p>
                        Author: <a href="#">{{ $project->username }}</a>
                        |
                        <i class="fa fa-tags"></i> Status:
                          @if($project->complete == 1)
                            <span class="badge badge-success project-badge">Completed</span>
                          @endif

                          @if($project->complete == 0)
                            <span class="badge badge-danger project-badge">Incomplete</span>
                          @endif
                        |
                        
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              @endforeach
@endsection

<!-- right-sidenav -->
@section('right-sidenav')
  <!-- insert featured projects here -->
  @include('layout.right-sidenav')
@endsection
