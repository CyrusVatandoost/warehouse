<div class="tab-pane" id="panel-issues">
   
  <br>
    
  <div class="card w-100">
    <div class="card-header">
      <h3>
        Issues
      <a href="#modal-container-new-issue" role="button" class="btn btn-primary float-right" data-toggle="modal">Add Issue</a>
      </h3>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">
        <div class="progress">
          <div class="progress-bar bg-success progress-bar-striped" style="width:{{$issue_progress}}%">
            Issues Progress: {{$issue_progress}}%
          </div>
        </div>
      <!-- incompleted issues -->
      @foreach($project->issues as $issue)
        @if($issue->completed == 0)
          <li class="list-group-item">
            <form class="form-inline" method="POST" action="/project/issue-set/{{$issue->issue_id}}">
              {{ csrf_field() }}
              <button type="submit" class="btn btn-outline-success">
                <i class="material-icons material-icons-mid md-18 md-dark">done</i>
              </button>
              &nbsp;
              {{ $issue->name }}
              @if( !empty($issue->assigned_to) )
                @foreach($users as $user)
                  @if($user->user_id == $issue->assigned_to)
                    ({{$user->first_name}})
                  @endif
                @endforeach
              @endif
            </form>
        @endif
      @endforeach
      <!-- completed issues -->
      @foreach($project->issues as $issue)
        @if($issue->completed == 1)
          <li class="list-group-item">
            <form class="form-inline" method="POST" action="/project/issue-set/{{$issue->issue_id}}">
              {{ csrf_field() }}
              <button type="submit" class="btn btn-success">
                <i class="material-icons material-icons-mid md-18 md-light">done</i>
              </button>
              &nbsp;
              {{ $issue->name }}
              @if( !empty($issue->assigned_to) )
                @foreach($users as $user)
                  @if($user->user_id == $issue->assigned_to)
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