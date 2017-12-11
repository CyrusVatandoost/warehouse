@section('style')
<style type="text/css">
    img{
        margin-right: 10px;
    }

    .msg_receive{
      padding-left:0;
      margin-left:0;
    }
    .messages {
      background: white;
      padding: 10px;
      border-radius: 10px;
      max-width:100%;
    }
    .messages > p {
        font-size: 13px;
        margin: 0 0 0.2rem 0;
      }
    .messages > time {
        font-size: 11px;
        color: #ccc;
    }

    .base_receive {
      padding-bottom: 10px;
    }

    .btn-browse{
      margin-top: 10px;
      margin-bottom: 10px;
    }

    .msg_container {
    padding: 10px;
    overflow: hidden;
    display: flex;
    }
    .base_sent {
      justify-content: flex-end;
      align-items: flex-end;
    }
    .msg_sent > time{
      float: right;
    }
    .msg_sent{
        padding-bottom:20px !important;
        margin-right:0;
    }
</style>
@endsection

@if($message->user->user_id == auth()->id() )
<!-- logged in user -->
<div class="row msg_container base_sent">
    <div class="col-md-11">
        <div class="messages msg_sent">
            <p>{{ $message->body }}</p>
            <time datetime="2009-11-13T20:00">{{ $message->user->first_name }} • {{ $message->created_at->diffForHumans() }}</time>
        </div>
    </div>
    <div class="col-md-1">

      @if (file_exists(public_path('uploads/avatars/'.$message->user->user_id.'.jpg')))
        <img class="rounded-circle" src="{{ asset('uploads/avatars/'.$message->user->user_id.'.jpg') }}" alt="{{ $message->user->first_name }}" height="64" width="64">
      @else
        <img class="rounded-circle" src="{{ asset('uploads/avatars/default.jpg') }}" alt="{{ $message->user->first_name }}" height="64" width="64">
      @endif
    
    </div>
</div>
@else
<!-- other user/s -->
<div class="row msg_container base_receive">
    <div class="col-md-1">

      @if (file_exists(public_path('uploads/avatars/'.$message->user->user_id.'.jpg')))
        <img class="rounded-circle" src="{{ asset('uploads/avatars/'.$message->user->user_id.'.jpg') }}" alt="{{ $message->user->first_name }}" height="64" width="64">
      @else
        <img class="rounded-circle" src="{{ asset('uploads/avatars/default.jpg') }}" alt="{{ $message->user->first_name }}" height="64" width="64">
      @endif

    </div>
    <div class="col-md-11">
        <div class="messages msg_receive">
            <p>{{ $message->body }}</p>
            <time datetime="2009-11-13T20:00">{{ $message->user->first_name }} • {{ $message->created_at->diffForHumans() }}</time>
        </div>
    </div>
</div>
@endif

 


