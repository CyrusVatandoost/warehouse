<div id="panel-settings">
  <p>
    <h4>Project Heads</h4>
    <ul class="list-group">
		  <li class="list-group-item">Name Here</li>
		  <li class="list-group-item">
		   <div class="container">
    <div class="expandable form-group" data-count="1">
        <div class="row">
            <label class="col-md-2 offset-md-2" for="name[]">Name(s):</label>
    	    <input name="name[]" type="text" id="name[]" value="name">
		    <button class="btn add-more" id="add-more" type="button">+</button>
	    </div>
    </div>
</div>
	  
		  </li>
		</ul>
  </p>
  <p>
    <h4>Project Collaborators</h4>
    <ul id="collaborator-list" class="list-group">
		  <li class="list-group-item">Cras justo odio</li>
		  <li class="list-group-item">Dapibus ac facilisis in</li>
		  <li class="list-group-item">Morbi leo risus</li>
		  <li class="list-group-item">Porta ac consectetur ac</li>
		</ul>
  </p>
  <div>
  	<form action="#">
  		<div style="float:left;" id="search">
				<input id="addcollaborator" type="text" placeholder="Add Collaborator">
			</div>
			<button style="margin-left: 10px;" type="submit" onclick="addCollaboratorElement()" class="btn btn-primary">Add</button>
		</form>
		&nbsp
	</div>
</div>

@section('customscripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="{!! asset('js/jquery.easy-autocomplete.min.js') !!}"></script>
<script>
var collaboratorElement = "null";
var collaboratorFirstName = "null";
var collaboratorLastName = "null";

//set the li element that was selected from the dropdown
function createCollaboratorElement(collaborator){
  collaboratorElement = collaborator;
}

//add the li element
function addCollaboratorElement(){
  var ul = document.getElementById("collaborator-list");
  var inputcollab = document.getElementById("addcollaborator");
  
  if (collaboratorElement != "null") {
    ul.appendChild(collaboratorElement);
    inputcollab.value = "";
  }
  
}

//Autocomplete script
var users = {
  url: "/user/autocomplete", //url to json file
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
      var collaborator = document.createElement("li");

      collaborator.className = "list-group-item";
      collaboratorFirstName = $("#addcollaborator").getSelectedItemData().first_name;
      if(collaboratorLastName = $("#addcollaborator").getSelectedItemData().last_name == "last_name"){
         collaboratorLastName = " ";
      }
      else{
       	collaboratorLastName = $("#addcollaborator").getSelectedItemData().last_name;
      }
    
      collaborator.appendChild(document.createTextNode(collaboratorFirstName+" "+ collaboratorLastName));
      createCollaboratorElement(collaborator);
    }
  }
};

$("#addcollaborator").easyAutocomplete(users);
</script>
@stop