<!-- DO NOT DELETE THIS FILE -->

<!-- this page follows this layout -->
<!-- i suggest make all new pages follow this layout -->
@extends('layout.app')

<!-- title at tab -->
@section('title', 'File Archive')
<!-- title at body -->
@section('page-title', 'File Archive')

<!-- css styles -->
@section('style')
	<!-- insert custom css styles here -->
	<!-- i suggest to avoid custom css styles and have it in the .css file in `public/css` -->
  <style type="text/css">
    img{
      height: auto; 
      width: auto; 
      max-width: 5em; 
      max-height: 5em;
      margin: auto;
    }
  </style>
@endsection

<!-- modals -->
@section('modals')
	<!-- insert css styles here -->
  @include('modals.project-new')
@endsection

<!-- left-sidenav -->
@section('left-sidenav')
  <p><a href="/admin" class="btn btn-primary btn-block">Back to Dashboard</a></p>
@endsection

<!-- body -->
@section('body')
  <!-- insert body here -->  
  <div class="table-responsive">   
    <table class="table table-hover">
      <thead class="thead-dark">
        <tr>
          <th>Project Name
          <th>Name
          <th>Display
          <th>Created At
          <th>Updated At
          <th>Restore
          <th>Archive
      </thead>
      <tbody>
        @foreach($file_archives as $file_archive)
          <tr>
            <td class="desc">{{ $file_archive->project->name }}
            <td class="desc small"><a href="{{ url('/uploads/archive/'.$file_archive->name) }}">{{ $file_archive->name }}</a>
            <td><img class="card-img-top file-img" src="{{ asset('/uploads/archive/'.$file_archive->name) }}" alt="Card image cap">
            <td class="desc">{{ $file_archive->created_at }}
            <td class="desc">{{ $file_archive->updated_at }}
            <td><a href="/archive/restore/{{ $file_archive->file_archive_id }}" class="btn btn-success">Restore</a>
            <td><a href="/archive/delete/{{ $file_archive->file_archive_id }}" class="btn btn-danger">Delete</a>
        @endforeach
      </tbody>
    </table>
  </div>

    <div class="row no-gutters">
      @foreach($file_archives as $file_archive)
        <div class="col-md-3">
          
        </div>
      @endforeach
    </div>

@endsection

<!-- right-sidenav -->
@section('right-sidenav')
  <!-- insert featured projects here -->
  @include('layout.right-sidenav') <!-- you can remove this if you do not want the featured projects to be shown -->
@endsection

@section('scripts')
	<!-- insert scripts here -->
@endsection