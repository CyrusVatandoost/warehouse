<!-- DO NOT DELETE THIS FILE -->

<!-- this page follows this layout -->
<!-- i suggest make all new pages follow this layout -->
@extends('layout.app')

<!-- title at tab -->
@section('title', 'Archive')
<!-- title at body -->
@section('page-title', 'Archive')

<!-- css styles -->
@section('style')
	<!-- insert custom css styles here -->
	<!-- i suggest to avoid custom css styles and have it in the .css file in `public/css` -->
@endsection

<!-- modals -->
@section('modals')
	<!-- insert css styles here -->
  @include('modals.new_project')
@endsection

<!-- left-sidenav -->
@section('left-sidenav')

@endsection

<!-- body -->
@section('body')
  <!-- insert body here -->  
  <div class="table-responsive">   
    <table class="table table-hover">
      <thead class="thead-dark">
        <tr>
          <th>File Archive ID
          <th>Project ID
          <th>Project Name
          <th>Name
          <th>Created At
          <th>Updated At
          <th>Restore
          <th>Archive
      </thead>
      <tbody>
        @foreach($file_archives as $file_archive)
          <tr>
            <td>{{ $file_archive->file_archive_id }}
            <td>{{ $file_archive->project_id }}
            <td>{{ $file_archive->project->name }}
            <td><a href="{{ url('/uploads/archive/'.$file_archive->name) }}">{{ $file_archive->name }}</a>
            <td>{{ $file_archive->created_at }}
            <td>{{ $file_archive->updated_at }}
            <td><a href="/archive/restore/{{ $file_archive->file_archive_id }}" class="btn btn-success">Restore</a>
            <td><a href="/archive/delete/{{ $file_archive->file_archive_id }}" class="btn btn-danger">Delete</a>
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="container-fluid">
    <div class="row projects-no-gutters align-items-start">
      @foreach($file_archives as $file_archive)
        <div class="card file-card-size">
          <img class="card-img-top file-img" src="{{ asset('/uploads/archive/'.$file_archive->name) }}" alt="Card image cap">
          <div class="card-body">
            {{ $file_archive->name }}
            <div class="file-buttons">
              <!-- buttons -->
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
  @include('layout.right-sidenav') <!-- you can remove this if you do not want the featured projects to be shown -->
@endsection

@section('scripts')
	<!-- insert scripts here -->
@endsection