<div class="tab-pane" id="panel-files">

  @include('modals.new_file')
  <style type="text/css">
    img{
      height: auto; 
      width: auto; 
      max-width: 5em; 
      max-height: 5em;
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
              <button type="submit" class="btn btn-primary upload">Upload</button>
            </div>
        </form>
      </div>
    </div>
  </div>

	<!-- list of files -->
  <p>
    <div class="">
      <div class="row no-gutters align-items-start">
        @foreach($project->files as $file)
        <div class="col-md-3">
          <div class="card file-card-size">
            <br>

            @if(pathinfo($file->name, PATHINFO_EXTENSION) == "jpg" || pathinfo($file->name, PATHINFO_EXTENSION) == "png")
              <img class="card-img-top file-img" src="{{ asset('/uploads/'.$project->project_id.'/'.$file->name) }}" alt="Card image cap">
            @else
              <img class="card-img-top file-img" src="{{ asset('/uploads/defaults/file.jpg') }}" alt="Card image cap">
            @endif

            <div class="card-body">
              <small>{{ $file->name }}</small>
              <div class="row">
                <div class="col file-buttons">
                  <!-- download -->
                  <span class="border border-secondary rounded custom-button"><a href="{{ url('uploads/'.$project->project_id.'/'.$file->name) }}" data-toggle="tooltip" data-placement="bottom" title="download" download><i class="material-icons material-icons-mid">file_download</i></a></span>
                  <!-- rename -->
                  <span class="border border-secondary rounded custom-button">
                    <a href="#modal-file-rename-{{$file->file_id}}" role="button" data-toggle="modal" data-toggle="tooltip" data-placement="bottom" title="edit">
                      <i class="material-icons material-icons-mid">edit</i>
                    </a>
                  </span>
                  <!-- delete -->
                  <span class="border border-secondary rounded custom-button">
                    <a href="/project/{{$project->project_id}}/file-archive/{{$file->file_id}}" data-toggle="tooltip" data-placement="bottom" title="delete">
                      <i class="material-icons material-icons-mid">delete</i></a></span>
                </div>
              </div>
            </div>
          </div>
          @include('modals.file-rename')
        </div>
        @endforeach
      </div>
    </div>
</div>