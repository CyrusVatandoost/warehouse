<h2>Add a new message</h2>
<form action="{{ route('messages.update', $thread->id) }}" method="post">
    {{ method_field('put') }}
    {{ csrf_field() }}
        
    <!-- Message Form Input -->
    <div class="form-group">
        <textarea name="message" id="message-body" class="form-control">{{ old('message') }}</textarea>
    </div>

    @if($users->count() > 0)
      <div id="search">
        <input id="provider-json" type="text" placeholder="Add Recipients">
        <button type="button" name="addRecipient" class="btn btn-primary" onclick="addRecipientElement()">Add </button>
      </div>
      <div id="recipient" >
          <!--<input style="display:none;" type="text" name="recipients[]" value="1"><br>-->
      </div>
    @endif

    <!-- Submit Form Input -->
    <br>
    <div class="form-group">
        <button type="submit" class="btn btn-primary form-control">Submit</button>
    </div>
</form>

@section('autocomplete')
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