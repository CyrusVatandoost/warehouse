<div class="tab-pane" id="panel-progress">
  
  <br>
    
  <div class="card w-100">
    <div class="card-header">
      <h3>
        Tasks
      <a href="#modal-container-new-task" role="button" class="btn btn-primary float-right" data-toggle="modal">Add Task</a>
      </h3>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">
        <div class="progress">
          <div class="progress-bar bg-success progress-bar-striped" style="width:{{$progress}}%">
            Project Progress: {{$progress}}%
          </div>
        </div>
      <!-- incompleted tasks -->
      @foreach($project->tasks as $task)
        @if($task->completed == 0)
          <li class="list-group-item">
            <form class="form-inline" method="POST" action="/project/task/{{$task->task_id}}/complete">
              {{ csrf_field() }}
              <button type="submit" class="btn btn-outline-success">
                <i class="material-icons material-icons-mid md-18 md-dark">done</i>
              </button>
              &nbsp;
              {{ $task->name }}
              @if( !empty($task->assigned_to) )
                @foreach($users as $user)
                  @if($user->user_id == $task->assigned_to)
                    ({{$user->first_name}})
                  @endif
                @endforeach
              @endif
            </form>
        @endif
      @endforeach
      <!-- completed tasks -->
      @foreach($project->tasks as $task)
        @if($task->completed == 1)
          <li class="list-group-item">
            <form class="form-inline" method="POST" action="/project/task/{{$task->task_id}}/complete">
              {{ csrf_field() }}
              <button type="submit" class="btn btn-success">
                <i class="material-icons material-icons-mid md-18 md-light">done</i>
              </button>
              &nbsp;
              {{ $task->name }}
              @if( !empty($task->assigned_to) )
                @foreach($users as $user)
                  @if($user->user_id == $task->assigned_to)
                    ({{$user->first_name}})
                  @endif
                @endforeach
              @endif
            </form>
        @endif
      @endforeach
    </ul>
  </div>

</div>