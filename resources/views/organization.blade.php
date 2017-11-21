@extends('layout.app')

@section('title', 'Organization')

@section('left-sidebar')
  <p><a href="#" class="btn btn-primary btn-block">New Announcement</a></p>
  <p><a href="#" class="btn btn-primary btn-block">New Project</a></p>
  @endsection

@section('body')
  <div class="panel-group" id="panel-691658">

    <div class="panel panel-default">
      <div class="panel-heading">
         <a class="panel-title" data-toggle="collapse" data-parent="#panel-691658" href="#panel-element-admin">Administrators</a>
      </div>
      <div id="panel-element-admin" class="panel-collapse collapse in">
        <div class="panel-body">
          Anim pariatur cliche...
        </div>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading">
         <a class="panel-title" data-toggle="collapse" data-parent="#panel-691658" href="#panel-element-fellows">Fellows</a>
      </div>
      <div id="panel-element-fellows" class="panel-collapse collapse">
        <div class="panel-body">
          Anim pariatur cliche...
        </div>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading">
         <a class="panel-title" data-toggle="collapse" data-parent="#panel-691658" href="#panel-element-researchers">Researchers</a>
      </div>
      <div id="panel-element-researchers" class="panel-collapse collapse">
        <div class="panel-body">
          Anim pariatur cliche...
        </div>
      </div>
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
