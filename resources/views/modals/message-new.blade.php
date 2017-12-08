<form action="{{ route('messages.store') }}" method="post">	
  {{ csrf_field() }}
	<div class="modal fade" id="modal-container-message-new" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">New Announcement</h4>
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
					    <input id="provider-json" type="text" placeholder="Add Recipients" required>
					    <button type="button" name="addRecipient" class="btn btn-primary" style="margin-top: 10px;" onclick="addRecipientElement()">Add </button>
					    <br>
					    <div  class="container" style="position: relative; left: -222;">
					      <div class="row col-md-6 col-md-offset-2 custyle">
					        <table id="recipientList" class="table table-striped custab">
					          <thead>
					            <tr>
					              <th>Recipients</th>
					          </thead>
					            <tr>
					            </tr>
					          </table>
					        </div>
					    </div>
					  </div>
					  <div id="recipient" >
					    <!--<input style="display:none;" type="text" name="recipients[]" value="1"><br>-->
					  </div>
					@endif

				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button> 
					<button type="submit" class="btn btn-success">Send Message</button>
				</div>

			</div>
		</div>
	</div>
</form>