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
  <button type="button" class="btn btn-dark">Dark</button>

  <div class="input-group">
    <span class="input-group-addon" id="basic-addon1">@</span>
    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
  </div>
  <br>
  <div class="input-group">
    <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
    <span class="input-group-addon" id="basic-addon2">@example.com</span>
  </div>
  <br>
  <label for="basic-url">Your vanity URL</label>
  <div class="input-group">
    <span class="input-group-addon" id="basic-addon3">https://example.com/users/</span>
    <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
  </div>
  <br>
  <div class="input-group">
    <span class="input-group-addon">$</span>
    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
    <span class="input-group-addon">.00</span>
  </div>
  <br>
  <div class="input-group">
    <span class="input-group-addon">$</span>
    <span class="input-group-addon">0.00</span>
    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
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
