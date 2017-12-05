@extends('layout.app')

@section('page-title', 'Projects')
@section('title', 'Projects')

@section('modals')
  @include('modals.new_project')
@endsection

@section('left-sidenav')
  <p><a href="#modal-container-new-project" role="button" class="btn btn-project btn-block" data-toggle="modal">New Project</a></p>
@endsection

@section('body')
  

    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link active" href="#panel-projects_all" data-toggle="tab">My Projects</a>
      </li>
      <li class="nav-item">
        <a class="nav-link"  href="#panel-all_projects" data-toggle="tab">All Projects</a>
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
                    <h4 class="card-title">
                      <a class="projects-link" href="{{ url('project') }}/{{ $project->project_id }}">
                        {{ $project->name }}
                      </a>
                    </h4>
                    <h6 class="card-subtitle mb-2 text-muted">
                      {{ $project->user->first_name }}
                    </h6>
                  </div>
                  <img class="card-img-top" src="http://lorempixel.com/output/people-q-c-600-200-1.jpg" alt="Card image cap">
                  <div class="card-body">
                    <p class="card-text">{{ $project->description }}</p>
                  </div>
                  <div class="card-footer">
                    @if($project->complete == 1)
                      <span class="badge badge-success">Compelete</span>
                    @endif

                    @if($project->complete == 0)
                      <span class="badge badge-danger">Incomplete</span>
                    @endif
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
                      <h4 class="card-title">
                        <a class="projects-link" href="{{ url('project') }}/{{ $project->project_id }}">{{ $project->name }}</a>
                      </h4>
                      <h6 class="card-subtitle mb-2 text-muted">{{ $project->user->first_name }}</h6>
                    </div>
                    <img class="card-img-top" src="http://lorempixel.com/output/people-q-c-600-200-1.jpg" alt="Card image cap">
                    <div class="card-body">
                      <p class="card-text">{{ $project->description }}</p>
                    </div>
                    <div class="card-footer">
                      @if($project->complete == 1)
                        <span class="badge badge-success">Compelete</span>
                      @endif

                      @if($project->complete == 0)
                        <span class="badge badge-danger">Incomplete</span>
                      @endif
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

