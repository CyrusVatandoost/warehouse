<div class="tab-pane active" id="panel-abstract">
  <br>
    <div class="container-fluid">

      @if(Storage::disk('uploads')->exists($project->project_id.'/README.html'))
        {!! Storage::disk('uploads')->get($project->project_id.'/README.html') !!}
      @endif

      @if(Auth::check())
      <br><br>
      <form method="POST" action="/project/{{$project->project_id}}/abstract-add">
        {{ csrf_field() }}
        <button type="submit" class="btn btn-primary">Add Abstract</button>
      </form>

      <br>
      <form method="POST" action="/project/{{$project->project_id}}/abstract-edit">
        {{ csrf_field() }}
        <button type="submit" class="btn btn-primary">Edit Abstract</button>
      </form>
      @endif

    </div>
</div>