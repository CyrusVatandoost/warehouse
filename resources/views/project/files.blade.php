<div class="tab-pane" id="panel-files">

  @include('modals.new_file')
	<p>

	<!-- list of files -->
  @foreach($project->files as $file)
  	<p>{{ $file->name }}
  @endforeach

  <p>
  <!-- add file button -->
  <a href="#modal-container-new-file" role="button" class="btn btn-primary" data-toggle="modal">Add File</a>
</div>