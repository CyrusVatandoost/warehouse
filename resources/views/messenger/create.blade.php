@extends('layout.app')

@section('title', 'Create New Message')
@section('page-title', 'Create a new message')

@section('style')
<style>
#search .empty-message {
  padding: 5px 10px;
  text-align: center;
}

</style>
@endsection


@section('body')
    <form action="{{ route('messages.store') }}" method="post">
        {{ csrf_field() }}
            <!-- Subject Form Input -->
            <div class="form-group">
              <label class="control-label">Subject</label>
              <input type="text" class="form-control" name="subject" placeholder="Subject" value="{{ old('subject') }}" required>
            </div>

            <!-- Message Form Input -->
            <div class="form-group">
                <label class="control-label">Message</label>
                <textarea name="message" class="form-control" required>{{ old('message') }}</textarea>
            </div>
            
            @if($users->count() > 0)
              <div id="search">
                <div class="row">
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-sm-10">               
                        <input class="form-control" id="provider-json" type="text" placeholder="Add Recipients" required>
                      </div>
                      <div class="col-sm-1"></div>
                      <div class="col-sm-1">     
                        <button type="button" name="addRecipient" class="btn btn-browse " style="margin-bottom: 10px; float:right;" onclick="addRecipientElement()">Add</button>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <table id="recipientList" class="table table-striped text-center">
                      <thead>
                        <tr>
                          <th>Recipients</th>
                    </table>
              <div id="recipient" >
                <!--<input style="display:none;" type="text" name="recipients[]" value="1"><br>-->
              </div>
            @endif
            <!-- Submit Form Input -->
                    <center>
                        <button type="submit" class="btn btn-browse">Submit</button>
                    </center>
                  </div>
                </div>
              </div>
    </form>
@endsection

@section('scripts')
<script>
var recipientElement = "null";
var recipientFirstName = "null";
var recipientLastName = "null";

//Set the recipient element when selected from dropdown
function createRecipientElement(element){
  recipientElement = element;
}

//Add the recipient element to the input form
function addRecipientElement(){
  var element = document.getElementById("recipient");
  var recipientlist = document.getElementById("recipientList");
  
  if (recipientElement != "null") {
    var row = recipientlist.insertRow(-1);
    var cell1 = row.insertCell(0);
    cell1.innerHTML = recipientFirstName+" "+recipientLastName;
    element.appendChild(recipientElement);
  }
  
}

//Autocomplete script
var users = {
  url: "/user/autocomplete",
  getValue: function(element) {
    if(element.email != "{{ auth()->user()->email }}"){
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
      var recipientRow = document.createElement("td");
      recipientFirstName = $("#provider-json").getSelectedItemData().first_name;
      if($("#provider-json").getSelectedItemData().last_name != "last_name")
        recipientLastName = $("#provider-json").getSelectedItemData().last_name;
      else
        recipientLastName = "";

      recipient.value = $("#provider-json").getSelectedItemData().user_id;
      recipient.id = $("#provider-json").getSelectedItemIndex()+1;
      recipient.name = "recipients[]";
      recipient.style.display = "none";
      
      createRecipientElement(recipient);
      //element.appendChild(recipient);
    }
  }
};

$("#provider-json").easyAutocomplete(users);

</script>
@endsection
