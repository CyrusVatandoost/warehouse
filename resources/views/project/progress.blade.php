<div class="tab-pane" id="panel-progress">
  
  <p>

  <!-- if project is complete -->
  @if($project->complete == 1)
    Complete!
  @endif

  <!-- if project is incomplete -->
  @if($project->complete == 0)
    Incomplete!
  @endif

  <form method="POST" action="/project/{{$project->project_id}}/complete">
		{{ csrf_field() }}
		<button type="submit" class="btn btn-primary">Change Completeness</button>
  </form>

</div>