<div class="tab-pane" id="panel-files">

  @include('modals.new_file')
  <style type="text/css">
    img{
      height: auto; 
      width: auto; 
      max-width: 20em; 
      max-height: 20em;
      margin: auto;
    }
  </style>

  <p>
  <!-- add file button -->
  <div class="container">
    <div class="row">
      <div class="col">
        <form method="post" action="/project/{{ $project->project_id }}/upload-file" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group files">
              <input type="file" class="form-control-file" name="file">
              <button type="submit" class="btn btn-browse upload">Upload</button>
            </div>
        </form>
      </div>
    </div>
  </div>

	<!-- list of files -->
  <p>
    <div class="container-fluid">
      <div class="row projects-no-gutters align-items-start">
        @foreach($project->files as $file)
          <div class="card file-card-size">
            <br>

            <img class="card-img-top file-img" src="{{ asset('/uploads/'.$project->project_id.'/'.$file->name) }}" alt="Card image cap">

            <div class="card-body">
              {{ $file->name }}
              <div class="file-buttons">
                <!-- download -->
                <span class="border border-secondary rounded custom-button"><a href="{{ url('uploads/'.$project->project_id.'/'.$file->name) }}" data-toggle="tooltip" data-placement="bottom" title="download" download><i class="material-icons material-icons-mid">file_download</i></a></span>
                <!-- rename -->
                <span class="border border-secondary rounded custom-button">
                  <a href="#modal-file-rename-{{$file->file_id}}" role="button" data-toggle="modal">
                    <i class="material-icons material-icons-mid">edit</i>
                  </a>
                </span>
                <!-- delete -->
                <span class="border border-secondary rounded custom-button"><a href="/project/{{$project->project_id}}/file-archive/{{$file->file_id}}" data-toggle="tooltip" data-placement="bottom" title="delete"><i class="material-icons material-icons-mid">delete</i></a></span>
              </div>
            </div>
          </div>
          @include('modals.file-rename')
        @endforeach
      </div>
    </div>
</div>