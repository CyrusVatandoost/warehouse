@extends('layout.app')

@if(Auth::check())
  @section('title', 'Home')
@endif

@section('style')
	<style>
	#search .empty-message {
		padding: 5px 10px;
		text-align: center;
	}
	</style>
@endsection

@section('modals')
  @include('modals.message-new')
@endsection

@section('left-sidenav')
  <p><a href="/messages/create" class="btn btn-primary btn-block">New Message</a></p>
  <p><a href="#modal-container-message-new" role="button" class="btn btn-primary btn-block" data-toggle="modal">New Message</a></p>
@endsection

@section('body')
    @include('messenger.partials.flash')
    @each('messenger.partials.thread', $threads, 'thread', 'messenger.partials.no-threads')
@stop

@section('right-sidenav')

@endsection

@section('scripts')
	<script>
		var recipientElement = "null";
		var recipientFirstName = "null";
		var recipientLastName = "null";

		//Set the recipient element when selected from dropdown
		function createRecipientElement(element) {
		  recipientElement = element;
		}

		//Add the recipient element to the input form
		function addRecipientElement() {
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