<!-- follows this layout -->
@extends('layout.app')

<!-- title at tab -->
@section('title', 'Welcome')
<!-- title at body -->
@section('page-title', 'Welcome')

<!-- add modals here -->
@section('modals')
  @include('modals.project-new')
@endsection

<!-- left-sidenav -->
@section('left-sidenav')

@endsection

<!-- body -->
@section('body')

  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      @for($i = 1; $i <= count($featured_projects); $i++)
        <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}"></li>
      @endfor
    </ol>

    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="storage/carousel1.jpg" alt="First slide">
      </div>
      @foreach($featured_projects as $project) 
        <div class="carousel-item">
          @if (file_exists(public_path('uploads/'.$project->project_id.'/banner.jpg')))
            <img class="d-block w-100" src="{{asset('uploads/'.$project->project_id.'/banner.jpg')}}">
          @else
            <img class="d-block w-100" src="{{asset('uploads/defaults/banner.jpg')}}">
          @endif
        </div>
      @endforeach
    </div>

    <!-- previous and next buttons -->
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>

  </div>

  <br>
  <p class="text-justify">
    Warehouse serves as a repository for journals and researches for the TE<sup>3</sup>D House. It is designed to manage and organize the organization's projects and files. Although this repository is made for the TE<sup>3</sup>D House, it can be remodelled and reprogrammed for use by other companies, organizations, and institutions with the goal of file management and organization. This software offers a distributed version control and source code management functionality of Git.
  <p>
    What are you waiting for? Get started now!
  <center>
    <a href="{{ url('projects') }}" class="btn btn-browse btn-lg">Browse Projects</a>
  </center><br>
</p>
@endsection

<!-- right-sidenav -->
@section('right-sidenav')
  <!-- insert featured projects here -->
@endsection