<div class="tab-pane" id="panel-files">

  @include('modals.new_file')
	<p>

	<!-- list of files -->
  @foreach($project->files as $file)
  	<p>{{ link_to_asset($project->project_id.'/'.$file->name) }}
  @endforeach

  <p>
  <!-- add file button -->
   <form method="POST" action="/project/{{ $project->project_id }}/upload-file" enctype="multipart/form-data">
  	{{ csrf_field() }}
    <input type="file" class="form-control-file" id="file" name="file">
		<button type="submit" class="btn btn-primary">Upload</button>
	</form>
</div>