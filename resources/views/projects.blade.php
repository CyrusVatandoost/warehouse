@extends('layout.app')

@section('page-title', 'Projects')
@section('title', 'Projects')

<!-- css styles -->
@section('style')
  <!-- insert custom css styles here -->
  <!-- i suggest to avoid custom css styles and have it in the .css file in `public/css` -->
  <style type="text/css">

    .item.list-group-item {
        width: 100%;
        margin-bottom: 10px;
        padding: 0px;
        display: table;
        height: 1px;
    } 

    .list-group-item-body.row {
      padding-left: 10px;
      height: 20em;
      margin-bottom: -25px;
      padding-top: 50px;
    }

   .list-group-item-body.row .photo {
      height: 200px;
      line-height: 200px;
    }

    .list-group-item-body.row .photo img {
       vertical-align: middle;
    }

    .photo img {
     display: block;
      width: 100%;
    }
  
  </style>
@endsection

@section('modals')
  @include('modals.project-new')
@endsection

@section('left-sidenav')
  <p><a href="#modal-container-new-project" role="button" class="btn btn-primary btn-block" data-toggle="modal">New Project</a></p>
@endsection

@section('body')

  <!-- nav tabs -->
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link nav-link-tabs active" href="#panel-projects_all" data-toggle="tab">My Projects</a>
    <li class="nav-item">
      <a class="nav-link nav-link-tabs"  href="#panel-all_projects" data-toggle="tab">All Projects</a>
  </ul>

  <!-- grid/list view switcher -->
  <div class="row">
    <div class="col-md-9"></div>
    <div class="col-md-3 project-button-group">
      <a href="#" id="list" class="btn btn-primary float-right"><i class="material-icons material-icons-mid">view_list</i>List</a>
      <a href="#" id="grid" class="btn btn-primary float-right"><i class="material-icons material-icons-mid">view_module</i>Grid</a>
    </div>
  </div>

  <!-- tab content -->
  <div class="tab-content">

    <div class="tab-pane active" id="panel-projects_all">
      <div class="container-fluid">
        <div id="projects" class="row projects-no-gutters align-items-start">

          @foreach($my_projects as $project)
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

      {{$my_projects->links('vendor.pagination.simple-bootstrap-4')}}
    </div>

    <div class="tab-pane" id="panel-all_projects">
      <div class="container-fluid">
        <div id="projects" class="row projects-no-gutters align-items-start">
          @foreach($all_projects as $project)
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
      {{$all_projects->links()}}
    </div>

  </div>

@endsection

<!-- right-sidenav -->
@section('right-sidenav')
  <!-- insert featured projects here -->
  @include('layout.right-sidenav')
@endsection

