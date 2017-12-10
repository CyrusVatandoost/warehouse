<form action="{{ route('messages.store') }}" method="post">	
  {{ csrf_field() }}
	<div class="modal fade" id="modal-container-message-new" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">New Message</h4>
					 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>

				<div class="modal-body">

					<div class="form-group">
						<label for="announcement_name">Subject</label>
            <input type="text" class="form-control" name="subject" placeholder="Subject" value="{{ old('subject') }}" required>
					</div>

					<div class="form-group">
						<label for="announcement_description">Message</label>
            <textarea name="message" class="form-control" required>{{ old('message') }}</textarea>
					</div>

					@if($users->count() > 0)
					  <div id="search">
					  	<div class="row">
						    <div class="col-sm-10">               
	                <input class="form-control" id="provider-json" type="text" placeholder="Add Recipients" required>
	              </div>
	              <div class="col-sm-2">     
	                <button type="button" name="addRecipient" class="btn btn-browse " style="margin-bottom: 10px; float:right;" onclick="addRecipientElement()">Add</button>
	              </div>
            	</div>
            <center>
			        <table id="recipientList" class="table table-striped text-center">
			          <thead>
			            <tr>
		              <th>Recipients</th>
			          </thead>
			            <tr>
			            </tr>
		          </table>
				    </center>
					  </div>
					  <div id="recipient" >
					    <!--<input style="display:none;" type="text" name="recipients[]" value="1"><br>-->
					  </div>
					@endif

				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button> 
					<button type="submit" class="btn btn-browse">Send Message</button>
				</div>

			</div>
		</div>
	</div>
</form>