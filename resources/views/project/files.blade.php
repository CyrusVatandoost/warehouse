<div class="tab-pane" id="panel-files">

  @include('modals.new_file')

  @foreach($project->files as $file)
  <p>{{ $file->name }}
  @endforeach

  <p><a href="#modal-container-new-file" role="button" class="btn btn-primary" data-toggle="modal">Add File</a></p>

</div>