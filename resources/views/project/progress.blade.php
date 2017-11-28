<div class="tab-pane" id="panel-progress">
  <p>
  @if($project->complete == 1)
    Complete!
  @endif

  @if($project->complete == 0)
    Incomplete!
  @endif
  </p>
</div>