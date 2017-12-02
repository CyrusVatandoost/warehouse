@extends('layout.app')

@section('title', 'Account')

@section('left-sidebar')
  <p><a href="#" class="btn btn-primary btn-block">New Announcement</a></p>
  <p><a href="#" class="btn btn-primary btn-block">New Project</a></p>
  @endsection
<style>

  .banner .container {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
        -ms-flex-align: center;
            align-items: center;
    -webkit-box-pack: start;
        -ms-flex-pack: start;
            justify-content: flex-start;
  }
  .container {
    width: 80%;
    max-width: 900px;
    margin: 0 auto;
    height: 100%;
    -webkit-transition: width .5s ease;
    transition: width .5s ease;
  }
  .profile-pic {
    height: 100%;
    width: 250px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: center;
        -ms-flex-pack: center;
            justify-content: center;
    -webkit-box-align: center;
        -ms-flex-align: center;
            align-items: center;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
        -ms-flex-direction: column;
            flex-direction: column;
  }
  .avatar {
    background-color: #bbbbbb;
    height: 190px;
    min-width: 190px;
    border-radius: 110px;
  }
  .bio {
    margin-left: 40px;
  }

</style>
@section('body')

  <div class="banner">
  <div class="container">
    <div class="profile-pic">
      <div class="avatar"></div>
      
    </div>
    <div class="bio">
      <h2 class="heading-medium">{{ auth()->user()->first_name }} {{ auth()->user()->middle_initial }} {{ auth()->user()->last_name }}</h2>
      <h5 class="heading-small">TE<sup>3</sup>D Member</h5>
      <h6 class="heading-small">{{ auth()->user()->email }}</h6>
      <p class="body-small">Hi I'm {{ auth()->user()->first_name }} and I am a third year college student taking up bachelor of science computer science in De La Salle University</p>
     <button type="button" class="btn btn-primary btn-sm">Edit Profile</button>
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
