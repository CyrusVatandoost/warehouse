<div class="tab-pane" id="panel-files">

  @include('modals.new_file')
	<p>

	<!-- list of files -->
  @foreach($project->files as $file)
    <div class="card">
      <img class="card-img-top" src="{{ asset($project->project_id.'/'.$file->name) }}" alt="Card image cap">
      <div class="card-body">
        {{ $file->name }}<br>
        <a href="{{ url($project->project_id.'/'.$file->name) }}" class="btn btn-primary">Download</a>
        <a href="#" class="btn btn-primary">Rename</a>
        <a href="/project/{{$project->project_id}}/delete-file/{{$file->file_id}}" class="btn btn-danger">Delete</a>
      </div>
    </div>
  @endforeach

  <p>
  <!-- add file button -->
   <form method="POST" action="/project/{{ $project->project_id }}/upload-file" enctype="multipart/form-data">
  	{{ csrf_field() }}
    <input type="file" class="form-control-file" id="file" name="file">
		<button type="submit" class="btn btn-primary">Upload</button>
	</form>
</div>