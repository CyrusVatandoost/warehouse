<!-- follows this layout -->
@extends('layout.app')

<!-- title at tab -->
@section('title', 'Search')
<!-- title at body -->
@section('page-title', 'Search results for: '.$searched)

<!-- add modals here -->
@section('modals')
  @include('modals.project-new')
@endsection

<!-- left-sidenav -->
@section('left-sidenav')
  <p><a href="#" class="btn btn-primary btn-block">New Announcement</a></p>
  <p><a href="#modal-container-new-project" role="button" class="btn btn-primary btn-block" data-toggle="modal">New Project</a></p>
@endsection

<!-- body -->
@section('body')
<form class="form-group" action="/search/filtertag" method="POST">
  {{ csrf_field() }}
 <select name="tag">
  <option selected>Filter By Tags</option>
  @if($tags->count()>0)
    @foreach($tags as $tag)
      <option value="{{ $tag->tag_id }}">{{ $tag->name }}</option>
    @endforeach
  @endif
</select>
<button type="submit" class="btn btn-primary">Filter</button>
</form>
<h1>Search results for "{{ @$searched }}"</h1>
<div class="tab-pane" id="panel-all_projects">

  <h4>Users</h4>
  @if($usersresults->count() > 0)
    <div class="container">
    	<div class="row">
    		<div class="span5">
          <table class="table table-striped table-condensed">
            <thead>
              <tr>
                <th>First Name
                <th>Last Name
                <th>Email
            <tbody>
            	@foreach($usersresults as $usersresult)
                <tr>
                  <td>{{ $usersresult->first_name }}
                  <td>{{ $usersresult->last_name }}
                  <td>{{ $usersresult->email }}
             @endforeach
          </table>
        </div>
    	</div>
    </div>
  @endif
  
  <h4>Projects</h4>
  <div class="tab-pane" id="panel-all_projects">
    <div class="container-fluid">
      <div class="row projects-no-gutters align-items-start">
      @if($projects->count()>0)
        @foreach($projects as $project)
          <div class="col-md-auto">
            <div class="card projects-card-size">
              <div class="card-block">
                <h4 class="card-header bg-dark" style="padding-left: 10px;">
                  <a class="text-white" href="{{ url('project') }}/{{ $project->pID }}">{{ $project->pName }}</a>
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
                    <i class="fa fa-tags"></i>
                    Status:
                    @if($project->complete == 1)
                      <span class="badge badge-success project-badge">Completed</span>
                    @endif

                    @if($project->complete == 0)
                      <span class="badge badge-danger project-badge">Incomplete</span>
                    @endif
                    |
                  </div>
                </div>
              </div>
            </div>
              @endforeach
            @else
              <h1>No Result</h1>
            @endif
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
