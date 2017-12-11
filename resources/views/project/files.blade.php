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
      <div class="col-md-1"></div>
      <div class="col-md-10">
        <form method="post" action="/project/{{ $project->project_id }}/upload-file" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group files">
              <input type="file" class="form-control-file" name="file">
              <button type="submit" class="btn btn-browse upload">Upload</button>
            </div>
        </form>
        <div class="col-md-1"></div>
      </div>
    </div>
  </div>

	<!-- list of files -->
  <p>
    <div class="container-fluid">
      <div class="row projects-no-gutters align-items-start">
        @foreach($project->files as $file)
          <div class="card file-card-size">
            <img class="card-img-top file-img" src="{{ asset('/uploads/'.$project->project_id.'/'.$file->name) }}" alt="Card image cap">
            <div class="card-body">
              {{ $file->name }}
              <div class="file-buttons">
                <span class="border border-secondary rounded custom-button"><a href="{{ url('uploads/'.$project->project_id.'/'.$file->name) }}" download><i class="material-icons material-icons-mid">file_download</i></a></span>
                <span class="border border-secondary rounded custom-button"><a href="#" ><i class="material-icons material-icons-mid">edit</i></a></span>
                <span class="border border-secondary rounded custom-button"><a href="/project/{{$project->project_id}}/delete-file/{{$file->file_id}}"><i class="material-icons material-icons-mid">delete</i></a></span>
                <span class="border border-secondary rounded custom-button"><a href="/project/{{$project->project_id}}/file-archive/{{$file->file_id}}""><i class="material-icons material-icons-mid">archive</i></a></span>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
</div>