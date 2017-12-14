<div class="tab-pane active" id="panel-abstract">
  <br>
    <div class="container-fluid">

      @if(Storage::disk('uploads')->exists($project->project_id.'/README.html'))
        {!! Storage::disk('uploads')->get($project->project_id.'/README.html') !!}
      @endif

      @if($project->collaborators->contains('user_id', Auth::id()) || $project->user_id == auth()->id())
        <br>
        <form method="POST" action="/project/{{$project->project_id}}/abstract-edit">
          {{ csrf_field() }}
          <button type="submit" class="btn btn-primary">Edit Abstract</button>
        </form>
      @endif

    </div>
</div>