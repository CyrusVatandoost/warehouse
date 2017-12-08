<div class="tab-pane" id="panel-files">

  @include('modals.new_file')
  <style type="text/css">
    .file-buttons{
      margin-top: 10px;
    }
    .custom-button{
       padding: 5px;
    }
    .custom-button a{
      color: #808080 !important;
      text-decoration: none !important;
    }
     .custom-button a:hover{
      color: #404040 !important;
    }
    .files input {
        outline: 2px dashed #92b0b3;
        outline-offset: -10px;
        -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
        transition: outline-offset .15s ease-in-out, background-color .15s linear;
        padding: 120px 0px 85px 35%;
        text-align: center !important;
        margin: 0;
        width: 100% !important;
        height: 250px;
    }
    .files input:focus{     
      outline: 2px dashed #92b0b3;  
      outline-offset: -10px;
      -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
      transition: outline-offset .15s ease-in-out, background-color .15s linear; 
      border:1px solid #92b0b3;
     }
    .files{ 
      position:relative;
    }
    .files:after {  
        pointer-events: none;
        position: absolute;
        top: 50px;
        left: 0;
        width: 50px;
        right: 0;
        height: 42px;
        content: "";
        background-image: url(../storage/download.png);
        display: block;
        margin: 0 auto;
        margin-top: 10px;
        background-size: 100%;
        background-repeat: no-repeat;
    }
    .files:before {
        position: absolute;
        bottom: 8px;
        left: 0;  pointer-events: none;
        width: 100%;
        right: 0;
        height: 70px;
        content: " or drag it here. ";
        display: block;
        margin: 0 auto;
        color: #2ea591;
        font-weight: 600;
        text-transform: capitalize;
        text-align: center;
    }
    .upload{
        display: block;
        padding: 5px;
        margin-top: 5px;
        height: 34px;
        width: auto;
        float: right;
    }

    .file-card-size{
       margin-right: 10px;
       margin-bottom: 10px;
       width: 30em;
    }

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
              <button type="submit" class="btn btn-primary upload">Upload</button>
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
            <img class="card-img-top file-img" src="{{ asset('storage'.$project->project_id.'/'.$file->name) }}" alt="Card image cap">
            <div class="card-body">
              {{ $file->name }}
              <div class="file-buttons">
                <span class="border border-secondary rounded custom-button"><a href="{{ url('storage/'.$project->project_id.'/'.$file->name) }}"><i class="material-icons material-icons-mid">file_download</i></a></span>
                <span class="border border-secondary rounded custom-button"><a href="#" ><i class="material-icons material-icons-mid">edit</i></a></span>
                <span class="border border-secondary rounded custom-button"><a href="/project/{{$project->project_id}}/delete-file/{{$file->file_id}}"><i class="material-icons material-icons-mid">delete</i></a></span>
              </div>
            </div>
          </div>
        @endforeach
      </div>
  </div>
</div>