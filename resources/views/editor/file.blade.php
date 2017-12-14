<!-- DO NOT DELETE THIS FILE -->

<!-- this page follows this layout -->
<!-- i suggest make all new pages follow this layout -->
@extends('layout.app')

<!-- title at tab -->
@section('title', 'Sample')
<!-- title at body -->
@section('page-title', 'Sample')

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
  <br>
  <form method="POST" action="/project/{{$project->project_id}}/abstract-update">
    {{ csrf_field() }}
    <textarea name="content" cols="100%" rows="20%">{{ $file }}</textarea>
    <br>
    <button type="submit" class="btn btn-primary">Save Changes</button>
  </form>
@endsection

<!-- right-sidenav -->
@section('right-sidenav')
  <!-- insert featured projects here -->
  @include('layout.right-sidenav') <!-- you can remove this if you do not want the featured projects to be shown -->
@endsection

@section('scripts')
	<!-- insert scripts here -->
  <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
  <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
@endsection