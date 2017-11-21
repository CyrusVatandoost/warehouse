@extends('layout.app')

@section('title', 'Projects')

@section('left-sidebar')
  <p><a href="#" class="btn btn-primary btn-block">New Project</a></p>
	@endsection

@section('body')

<ul class="nav nav-tabs">
  <li class="active">
    <a href="#panel-summary" data-toggle="tab">My Projects</a>
  </li>
  <li>
    <a href="#panel-files" data-toggle="tab">All Projects</a>
  </li>
</ul>

<div class="tab-content">

  <div class="tab-pane active" id="panel-summary">
    <p>
      <div class="row">

        @foreach($project_list as $project)
          <div class="col-md-4">
            <div class="thumbnail">
              <img alt="Bootstrap Thumbnail First" src="http://lorempixel.com/output/people-q-c-600-200-1.jpg" />
              <div class="caption">
                <h3>
                  <a href="{{ url('project') }}/{{ $project->id }}">{{ $project->name }}</a>
                </h3>
                <p>
                  {{ $project-> description }}
                </p>
              </div>
            </div>
          </div>
        @endforeach

        </div>
      </p>
    </div>

  <div class="tab-pane" id="panel-files">
    <p>
      <div class="row">

        <div class="col-md-4">
          <div class="thumbnail">
            <img alt="Bootstrap Thumbnail Second" src="http://lorempixel.com/output/city-q-c-600-200-1.jpg" />
            <div class="caption">
              <h3>
                <a href="{{ url('project') }}">Thumbnail label</a>
              </h3>
              <p>
                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="thumbnail">
            <img alt="Bootstrap Thumbnail Second" src="http://lorempixel.com/output/city-q-c-600-200-1.jpg" />
            <div class="caption">
              <h3>
                <a href="{{ url('project') }}">Thumbnail label</a>
              </h3>
              <p>
                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="thumbnail">
            <img alt="Bootstrap Thumbnail Second" src="http://lorempixel.com/output/city-q-c-600-200-1.jpg" />
            <div class="caption">
              <h3>
                <a href="{{ url('project') }}">Thumbnail label</a>
              </h3>
              <p>
                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="thumbnail">
            <img alt="Bootstrap Thumbnail Second" src="http://lorempixel.com/output/city-q-c-600-200-1.jpg" />
            <div class="caption">
              <h3>
                <a href="{{ url('project') }}">Thumbnail label</a>
              </h3>
              <p>
                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="thumbnail">
            <img alt="Bootstrap Thumbnail Second" src="http://lorempixel.com/output/city-q-c-600-200-1.jpg" />
            <div class="caption">
              <h3>
                <a href="{{ url('project') }}">Thumbnail label</a>
              </h3>
              <p>
                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="thumbnail">
            <img alt="Bootstrap Thumbnail Second" src="http://lorempixel.com/output/city-q-c-600-200-1.jpg" />
            <div class="caption">
              <h3>
                <a href="{{ url('project') }}">Thumbnail label</a>
              </h3>
              <p>
                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
              </p>
            </div>
          </div>
        </div>

      </div>
    </p>
  </div>
</div>

	@endsection

@section('right-sidebar')
  <div class="well">
    <p>ADS</p>
  </div>

  <div class="well">
    <p>ADS</p>
  </div>

	@endsection
