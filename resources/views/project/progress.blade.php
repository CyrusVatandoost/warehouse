<div class="tab-pane" id="panel-progress">
  
  <p>
    
  <form method="POST" action="/project/{{$project->project_id}}/complete">
		{{ csrf_field() }}
		<button type="submit" class="btn btn-primary">Change Completeness</button>
  </form>

</div>