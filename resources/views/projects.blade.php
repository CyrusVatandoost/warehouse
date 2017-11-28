@extends('layout.app')

@section('title', 'Projects')

@section('left-sidenav')
  <p><a href="#modal-container-new-project" role="button" class="btn btn-primary btn-block" data-toggle="modal">New Project</a></p>
@endsection

@section('body')
 
  @include('modals.new_project')

    <ul class="nav nav-tabs">
      <li class="active">
        <a class="btn" href="#panel-projects_all" data-toggle="tab">My Projects</a>
      </li>
      <li>
        <a class="btn"  href="#panel-all_projects" data-toggle="tab">All Projects</a>
      </li>
    </ul>

    <div class="tab-content">

      <div class="tab-pane active" id="panel-projects_all">
        <p>
        <div class="row">
          @foreach($my_projects as $project)
            <div class="col">
              <div class="card" style="width: 20em;">
                <img class="card-img-top" src="http://lorempixel.com/output/people-q-c-600-200-1.jpg" alt="Card image cap">
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="{{ url('project') }}/{{ $project->project_id }}">{{ $project->name }}</a>
                  </h4>
                  <h6 class="card-subtitle mb-2 text-muted">{{ $project->user->first_name }}</h6>
                  <p class="card-text">{{ $project->description }}</p>
                  
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

      <div class="tab-pane" id="panel-all_projects">
        <p>
        <div class="row">
          @foreach($all_projects as $project)
            <div class="col">
              <div class="card" style="width: 20em;">
                <img class="card-img-top" src="http://lorempixel.com/output/people-q-c-600-200-1.jpg" alt="Card image cap">
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="{{ url('project') }}/{{ $project->project_id }}">{{ $project->name }}</a>
                  </h4>
                  <h6 class="card-subtitle mb-2 text-muted">{{ $project->user->first_name }}</h6>
                  <p class="card-text">{{ $project->description }}</p>
                  
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

@endsection

@section('right-sidenav')
  
@endsection
