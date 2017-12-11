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
				  	<th colspan="2">To-Do List
		  </thead>
          @foreach($tasks as $task)
            @if($task->project_id == $project->project_id && $task->completed == 0)

              <tr>
                <td>

                    <!-- <a href="/project/{{$project->project_id}}/task/complete" role="button" class="btn" data-toggle="modal">
                      <i class="material-icons">radio_button_unchecked</i>
                       --><!-- <i class="material-icons">check_circle</i> -->
                    <!-- </a> -->

                    <form class="form-inline" method="POST" action="/project/task/{{$task->task_id}}/complete">
                      {{ csrf_field() }}
                      <button type="submit" class="btn btn-success">Mark as Completed</button>
                    </form>
                <td>
                  {{ $task->name }}  
                  @if( !empty($task->assigned_to) )
                    @foreach($users as $user)

                      @if($user->user_id == $task->assigned_to)
                          (assigned to {{$user->first_name}} {{ $user->last_name }})
                      @endif

                    @endforeach
                  @endif 

            @endif
          @endforeach
      <tbody>

      </tbody>
		</table>
  </div>

  <!-- DISPLAY open, completed, all TASKS IN TAB VIEW-->
  <!-- <div class="tabbable" id="tabs-463690">

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
    
  </div> -->

</div>