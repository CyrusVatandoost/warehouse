@extends('layout.app')

@section('page-title', 'Projects')
@section('title', 'Projects')

@section('modals')
  @include('modals.project-new')
@endsection

@section('left-sidenav')

@endsection

@section('body')

  <div class="container-fluid">
    <div id="projects" class="row projects-no-gutters align-items-start">

      @foreach($projects as $project)
        <div class="item col-md-4">
          <div class="card projects-card-size">
            <h4 class="project-card-header bg-dark">
              <div class="row project-header-row">
                <div class="col-sm-8">
                  <a href="{{ url('project') }}/{{ $project->project_id }}">
                    <p class="limit-header text-white">{{ $project->name }}</p>
                  </a>
                  <p class="small text-white font-italic">
                    <sup>
                      <small>
                        By: <a class="text-white" href="#">{{ $project->user->first_name }}</a>
                      </small>
                    </sup>
                  </p>
                </div>
                <div class="col-sm-4">
                  @if($project->public == 1)
                    <span class="badge project-visibility float-right">
                      <i class="material-icons material-icons-mid md-light">public</i>
                    </span>
                  @else
                    <span class="badge project-visibility float-right">
                      <i class="material-icons material-icons-mid md-light">lock_outline</i>
                    </span>
                  @endif
                </div>

            </h4>
            <div class="list-group-item-body">
              <div class="photo text-center">
                <a class="projects-link" href="{{ url('project') }}/{{ $project->project_id }}">

                    @if (file_exists(public_path('/uploads/'.$project->project_id.'/banner.jpg')))
                      <img class="project-image img-fluid" src="{{ asset('/uploads/'.$project->project_id.'/banner.jpg') }}" alt="avatar">
                    @else
                      <img class="project-image img-fluid" src="{{ asset('/uploads/defaults/banner.jpg') }}" alt="avatar">
                    @endif

                </a>
              </div>
              <div class="card-body project-card-body">
                <p class="card-text limit">{{ $project->description }}</p>
                <div class="row">
                  <div class="col-md-auto small p-2  project-footer">
                    <p class="small">
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
        </div>
      @endforeach

    </div>
  </div>

  {{$projects->links('vendor.pagination.simple-bootstrap-4')}}

@endsection

<!-- right-sidenav -->
@section('right-sidenav')
  <!-- insert featured projects here -->
@endsection

