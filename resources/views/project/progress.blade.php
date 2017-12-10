<div class="tab-pane" id="panel-progress">
  
  <p>
    
  <form method="POST" action="/project/{{$project->project_id}}/complete">
		{{ csrf_field() }}
		<button type="submit" class="btn btn-primary">Change Completeness</button>
  </form>

  <hr>

  <p><a href="#modal-container-new-task" role="button" class="btn btn-primary btn-block" data-toggle="modal">Add a Task</a></p>

  <br>

  <div class="table-responsive">   
		<table class="table table-hover">
			<thead class="thead-dark">
		      <tr>
				  	<th>Project Tasks
		    </thead>
		</table>
  </div>

  <div class="tabbable" id="tabs-463690">

    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link nav-link-tabs active" href="#tasks-open" data-toggle="tab">Open Tasks</a>
      </li>

      <li class="nav-item">
        <a class="nav-link nav-link-tabs active" href="#tasks-completed" data-toggle="tab">Completed Tasks</a>
      </li>

      <li class="nav-item">
        <a class="nav-link nav-link-tabs active" href="#tasks-all" data-toggle="tab">All Tasks</a>
      </li>
    </ul>

    <div class="tab-content">
      @include('project.tasks.open')
      @include('project.tasks.completed')
      @include('project.tasks.all')
    </div>
    
  </div>

</div>