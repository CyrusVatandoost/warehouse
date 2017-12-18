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
    <div class="row no-gutters">
      @if($projects->count()>0)
        @foreach($projects as $project)
          <div class="item col-md-4">
              <div class="card projects-card-size">
                <h4 class="project-card-header bg-dark">
                  <div class="row project-header-row">
                    <div class="col-sm-8">
                      <a href="{{ url('project') }}/{{ $project->pID }}">
                        <p class="limit-header text-white">{{ $project->pName }}</p>
                      </a>
                      <p class="small text-white font-italic">
                        <sup>
                          <small>
                            By: <a class="text-white" href="#">{{ $project->username.' '.$project->lastname }}</a>
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
                  <div class="photo text-center">
                    <a class="projects-link"  href="{{ url('project') }}/{{ $project->pID}}">

                        @if (file_exists(public_path('/uploads/'.$project->pID.'/banner.jpg')))
                          <img class="project-image img-fluid" src="{{ asset('/uploads/'.$project->pID.'/banner.jpg') }}" alt="avatar">
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
                          @foreach($project->tags as $tag)
                            <span class="badge badge-info">{{ $tag->name }}</span>
                          @endforeach
                      </p>
                    </div>
                  </div>
                  </div>
                </div>
              </div>
              @endforeach
            @else
              <h1>No Result</h1>
            @endif
  

@endsection

<!-- right-sidenav -->
@section('right-sidenav')
  <!-- insert featured projects here -->
  @include('layout.right-sidenav')
@endsection
