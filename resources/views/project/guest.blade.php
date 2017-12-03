@extends('layout.app')

@section('page-title', 'Projects')
@section('title', 'Projects')

@section('modals')
  @include('modals.new_project')
@endsection

@section('left-sidenav')

@endsection

@section('body')
  <p>
  <div class="container-fluid">
    <div class="row no-gutters align-items-start">
      @foreach($projects as $project)
        <div class="col-md-auto">
          <div class="card card-size">
            <div class="card-block">
              <h4 class="card-title">
                <a href="{{ url('project') }}/{{ $project->project_id }}">
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

@endsection

<!-- right-sidenav -->
@section('right-sidenav')
  <!-- insert featured projects here -->
@endsection

