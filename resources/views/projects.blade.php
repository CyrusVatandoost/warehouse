@extends('layout.app')

@section('page-title', 'Projects')
@section('title', 'Projects')

@section('modals')
  @include('modals.new_project')
@endsection

@section('left-sidenav')
  <p><a href="#modal-container-new-project" role="button" class="btn btn-primary btn-block" data-toggle="modal">New Project</a></p>
@endsection

@section('body')
  

    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link nav-link-tabs active" href="#panel-projects_all" data-toggle="tab">My Projects</a>
      </li>
      <li class="nav-item">
        <a class="nav-link nav-link-tabs"  href="#panel-all_projects" data-toggle="tab">All Projects</a>
      </li>
    </ul>

    <div class="tab-content">

      <div class="tab-pane active" id="panel-projects_all">
        <p>
        <div class="container-fluid">
          <div class="row projects-no-gutters align-items-start">
            @foreach($my_projects as $project)
            <div class="col-md-auto">
              <div class="card projects-card-size">
                <div class="card-block">
                  <h4 class="card-header bg-dark" style="padding-left: 10px; padding-top: 20px; padding-bottom: 0;">
                    <a href="{{ url('project') }}/{{ $project->project_id }}">
                      <p class="limit-header text-white"> {{ $project->name }} </p>
                    </a>
                    <div class="float-right small">
                        @if($project->public == 1)
                          <span class="badge badge-success">
                            <i class="material-icons material-icons-mid">lock_open</i>
                          </span>
                        @endif

                        @if($project->public == 0)
                          <span class="badge badge-danger">
                            <i class="material-icons material-icons-mid">lock_outline</i>
                          </span>
                        @endif
                      
                    </div>
                  </h4>
                  <div class="image">
                    <a class="projects-link" href="{{ url('project') }}/{{ $project->project_id }}">
                      <img src="http://lorempixel.com/output/people-q-c-600-200-1.jpg" class="img-thumbnail" alt="avatar" style="margin-top: 20px; margin-bottom: 20px;"/>
                    </a>
                  </div>
                  <div class="card-body">
                    <p class="card-text limit">{{ $project->description }}</p>
                  </div>
                  <div class="row">
                    <div class="col text-center small p-2" style="position: absolute; bottom: 0;">
                      <p>
                        Author: <a href="#">{{ $project->user->first_name }}</a>
                        |
                        <i class="fa fa-tags"></i> Status:
                          @if($project->complete == 1)
                            <span class="badge badge-success project-badge">Completed</span>
                          @endif

                          @if($project->complete == 0)
                            <span class="badge badge-danger project-badge">Incomplete</span>
                          @endif
                        |
                        <i class="fa fa-tags"></i> Tags:  
                          @foreach($project->tags as $something)
                            <span class="badge badge-info">{{ $something->tag->name }}</span>
                          @endforeach
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>

      <div class="tab-pane" id="panel-all_projects">
        <p>
          <div class="container-fluid">
            <div class="row projects-no-gutters align-items-start">
              @foreach($all_projects as $project)
                <div class="col-md-auto">
                <div class="card projects-card-size">
                <div class="card-block">
                  <h4 class="card-header bg-dark"  style="padding-left: 10px; padding-top: 20px; padding-bottom: 0;">
                    <a class="text-white" href="{{ url('project') }}/{{ $project->project_id }}">
                      <p class="limit-header text-white">{{ $project->name }}</p>
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
                    <a class="projects-link" href="{{ url('project') }}/{{ $project->project_id }}">
                      <img src="http://lorempixel.com/output/people-q-c-600-200-1.jpg" class="img-thumbnail" alt="avatar" style="margin-top: 20px; margin-bottom: 20px;"/>
                    </a>
                  </div>
                  <div class="card-body">
                    <p class="card-text">{{ $project->description }}</p>
                  </div>
                  <div class="row">
                    <div class="col text-center small p-2" style="position: absolute; bottom: 0;">
                      <p>
                        Author: <a href="#">{{ $project->user->first_name }}</a>
                        |
                        <i class="fa fa-tags"></i> Status:
                          @if($project->complete == 1)
                            <span class="badge badge-success project-badge">Completed</span>
                          @endif

                          @if($project->complete == 0)
                            <span class="badge badge-danger project-badge">Incomplete</span>
                          @endif
                        |
                        <i class="fa fa-tags"></i> Tags:  
                          @foreach($project->tags as $something)
                            <span class="badge badge-info">{{ $something->tag->name }}</span>
                          @endforeach
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>

@endsection

<!-- right-sidenav -->
@section('right-sidenav')
  <!-- insert featured projects here -->
  @include('layout.right-sidenav')
@endsection

