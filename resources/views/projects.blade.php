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
  <style type="text/css">
    .item.list-group-item
    {
        width: 100%;
        margin-bottom: 10px;
        padding: 0px;
        display: table;
    }
    .list-group-item-body.row{
      padding-left: 10px;
      height: 15em;
      margin-bottom: -25px;
    }

   .list-group-item-body.row .photo{
      height: 200px;
      line-height: 200px;
    }

    .list-group-item-body.row .photo img{
       vertical-align: middle;
    }
  
    .photo{
      height: 5em;
      width: auto;
    }

    .photo img {
      max-width: 100%;
      max-height: 100%;
    }
  </style>

    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link nav-link-tabs active" href="#panel-projects_all" data-toggle="tab">My Projects</a>
      </li>
      <li class="nav-item">
        <a class="nav-link nav-link-tabs"  href="#panel-all_projects" data-toggle="tab">All Projects</a>
      </li>
    </ul>
    <div class="row">
      <div class="col-md-9"></div>
      <div class="col-md-3 project-button-group">
        <a href="#" id="list" class="btn btn-primary float-right"><i class="material-icons material-icons-mid">view_list</i>List</a>
        <a href="#" id="grid" class="btn btn-primary float-right"><i class="material-icons material-icons-mid">view_module</i>Grid</a>
      </div>
    </div>
    <div class="tab-content">

      <div class="tab-pane active" id="panel-projects_all">
        <p>
        <div class="container-fluid">
          <div id="projects" class="row projects-no-gutters align-items-start">
          <center>{{$my_projects->links()}}</center>
            @foreach($my_projects as $project)
            <div class="item col-md-4">
              <div class="card projects-card-size">
                <h4 class="project-card-header bg-dark">
                  <div class="row">
                    <div class="col-sm-8">
                      <a href="{{ url('project') }}/{{ $project->project_id }}">
                        <p class="limit-header text-white">{{ $project->name }}</p>
                      </a>
                    </div>
                    <div class="col-sm-4">
                          @if($project->public == 1)
                            <span class="badge badge-success project-visibility float-right">
                              <i class="material-icons material-icons-mid">lock_open</i>
                            </span>
                          @endif

                          @if($project->public == 0)
                            <span class="badge badge-danger project-visibility float-right">
                              <i class="material-icons material-icons-mid">lock_outline</i>
                            </span>
                          @endif
                        </div>
                  </div>

                </h4>
                <div class="list-group-item-body">
                  <div class="photo text-center">
                    <a class="projects-link" href="{{ url('project') }}/{{ $project->project_id }}">
                      <img class="project-image img-fluid" src="https://static.pexels.com/photos/701738/pexels-photo-701738.jpeg" alt="avatar" />
                    </a>
                  </div>
                  <div class="card-body project-card-body">
                    <p class="card-text limit">{{ $project->description }}</p>
                    <div class="row">
                      <div class="col-md-auto small p-2  project-footer">
                        <p class="small">
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
            </div>
          @endforeach
          <center>{{$my_projects->links()}}</center>
        </div>
      </div>
    </div>

      <div class="tab-pane" id="panel-all_projects">
        <p>
          <div class="container-fluid">
            <div id="projects" class="row projects-no-gutters align-items-start">
            <center>{{$my_projects->links()}}</center>
              @foreach($all_projects as $project)
                <div class="item col-md-4">
                  <div class="card projects-card-size">
                    <h4 class="project-card-header bg-dark">
                      <div class="row">
                        <div class="col-sm-8">
                          <a href="{{ url('project') }}/{{ $project->project_id }}">
                            <p class="limit-header text-white">{{ $project->name }}</p>
                          </a>
                        </div>
                        <div class="col-sm-4">
                              @if($project->public == 1)
                                <span class="badge badge-success project-visibility float-right">
                                  <i class="material-icons material-icons-mid">lock_open</i>
                                </span>
                              @endif

                              @if($project->public == 0)
                                <span class="badge badge-danger project-visibility float-right">
                                  <i class="material-icons material-icons-mid">lock_outline</i>
                                </span>
                              @endif
                            </div>
                      </div>

                    </h4>
                    <div class="list-group-item-body">
                      <div class="photo text-center">
                        <a class="projects-link" href="{{ url('project') }}/{{ $project->project_id }}">
                          <img class="project-image img-fluid" src="https://static.pexels.com/photos/701738/pexels-photo-701738.jpeg" alt="avatar" />
                        </a>
                      </div>
                      <div class="card-body project-card-body">
                        <p class="card-text limit">{{ $project->description }}</p>
                        <div class="row">
                          <div class="col-md-auto small p-2  project-footer">
                            <p class="small">
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
                </div>
              </div>
            </div>
              @endforeach
              <center> {{$all_projects->links()}} </center>
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

