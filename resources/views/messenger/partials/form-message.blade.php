
<form action="{{ route('messages.update', $thread->id) }}" method="post">
    {{ method_field('put') }}
    {{ csrf_field() }}
        
    @if($users->count() > 0)
      <div id="search">
        <input id="provider-json" type="text" placeholder="Add Another Recipient">
        <button type="button" name="addRecipient" class="btn btn-primary" onclick="addRecipientElement()">Add </button>
      </div>
      <div id="recipient">
          <!--<input style="display:none;" type="text" name="recipients[]" value="1"><br>-->
      </div>
    @endif

    <!-- Message Form Input -->
    <div class="editbio">
      <textarea name="message" id="message-body" class="form-control" required>{{ old('message') }}</textarea>
    </div>

    <!-- Submit Form Input -->
    <button type="submit" class="btn btn-browse float-right">Send <i class="material-icons material-icons-mid">near_me</i></button>
</form>

 

@section('scripts')
<script>
var recipientElement = "null";
var recipientFirstName = "null";

//Set the recipient element when selected from dropdown
function createRecipientElement(element){
  recipientElement = element;
}

//Add the recipient element to the input form
function addRecipientElement(){
  var element = document.getElementById("recipient");
  var search = document.getElementById("search");
  var messagetext = document.getElementById("message-body");
  var node = document.createTextNode("Recipient Added! Press submit to confirm.");
  
  if (recipientElement != "null") {
    element.appendChild(recipientElement);
    search.appendChild(node);
    messagetext.value = recipientFirstName+" was added to the thread!";
  }
  
}

//Autocomplete script
var users = {
  url: "/user/autocomplete",
  getValue: function(element) {
    @foreach($users as $user)
      if(element.email == "{{ @$user->email }}"){
        if(element.last_name == "last_name"){
          return element.first_name+" ";
        }
        else{
          return element.first_name+" "+element.last_name;
        }
      }
      else{
        return "No user";
      }
    @endforeach
  },
  list: {
    match: {
      enabled:true
    },
    showAnimation: {
      type: "slide", //normal|slide|fade
      time: 400,
      callback: function() {}
    },
    hideAnimation: {
      type: "slide", //normal|slide|fade
      time: 400,
      callback: function() {}
    },
    onClickEvent: function() {
      var recipient = document.createElement("input");

      recipientFirstName = $("#provider-json").getSelectedItemData().first_name;
      recipient.value = $("#provider-json").getSelectedItemData().user_id;
      recipient.id = $("#provider-json").getSelectedItemIndex()+1;
      recipient.name = "recipients[]";
      recipient.style.display = "none";
      
      createRecipientElement(recipient);
    }
  }
};

$("#provider-json").easyAutocomplete(users);
</script>
@endsection