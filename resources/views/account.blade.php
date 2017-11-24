@extends('layout.app')

@section('title', 'Juang Dela Cruz')

@section('left-sidebar')
  <p><a href="#" class="btn btn-primary btn-block">New Announcement</a></p>
  <p><a href="#" class="btn btn-primary btn-block">New Project</a></p>
  @endsection

@section('body')
  <img src="res/account.png" width="150" height="150">
  <p><a href="/warehouse/account/edit.php">juandelacruz@dlsu.edu.ph</a>
  <p>T3D Member

  <hr>
  <p>Hi I am Juan and I am a third year college student taking up bachelor of science computer science in De La Salle University</p>
  @endsection

@section('right-sidebar')
  <div class="well">
    <p>ADS</p>
  </div>

  <div class="well">
    <p>ADS</p>
  </div>

  @endsection
