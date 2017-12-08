<?php $class = $thread->isUnread(Auth::id()) ? 'alert-info' : ''; ?>
<style type="text/css">

</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
        <div class="card">
            <a class="text-white"  href="{{ route('messages.show', $thread->id) }}">
            <h4 class="card-header rounded bg-dark"> {{ $thread->subject }}
                <div class="float-right small">
                    <!-- Numver of undread messages-->
                    <span class="badge bg-danger">{{ $thread->userUnreadMessagesCount(Auth::id()) }}</span>
                </div>
            </h4>
            </a>
      <div class="card-body">
        <h4 class="card-title">{{ $thread->latestMessage->body }}</h4>
          <p class="card-text "> 
            <small><strong>Creator:</strong> {{ $thread->creator()->first_name }}</small>
            <br>
            <small><strong>Participants:</strong> {{ $thread->participantsString(Auth::id()) }}</small>
        </p>
      </div>
    </div>
  </div>       
</div>
</div>
<p></p>


