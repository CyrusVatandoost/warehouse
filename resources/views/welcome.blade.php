@extends('layout.welcome')

@section('title', 'Welcome')

@section('body')
  <div class="carousel slide" id="carousel-191868" data-ride="carousel">
    <ol class="carousel-indicators">
      <li class="active" data-slide-to="0" data-target="#carousel-191868">
      </li>
      <li data-slide-to="1" data-target="#carousel-191868">
      </li>
      <li data-slide-to="2" data-target="#carousel-191868">
      </li>
    </ol>
    <div class="carousel-inner">
      <div class="item active">
        <img alt="Carousel Bootstrap First" src="/storage/homepage1.jpg" width="100%"/>
      </div>
      <div class="item">
        <img alt="Carousel Bootstrap Second" src="/storage/homepage2.jpg" width="100%"/>
      </div>
      <div class="item">
        <img alt="Carousel Bootstrap Third" src="/storage/homepage3.jpg" width="100%"/>
      </div>
    </div>
    <a class="left carousel-control" href="#carousel-191868" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="right carousel-control" href="#carousel-191868" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
  </div>

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12" style="padding: 5%;">
        <p>
        <h3>
          Welcome to WareHouse!
        </h3>
        <p>
          The goal of WareHouse is to serve as a repository for journals and researches for the TE3D House. It is designed to manage and organize the organization's projects and files. Although this repository is made for the TE3D House, it can be remodelled and reprogrammed for use by other companies, organizations, and institutions with the goal of file management and organization. This software offers a distributed version control and source code management functionality of Git.
        <p>
          What are you waiting for? Get started now!
        </p>
        <center>
          <a href="/warehouse/projects" class="btn btn-primary btn-lg">
            Browse Projects
          </a>
        </center>
      </p>
      </div>
    </div>
  </div>
@endsection