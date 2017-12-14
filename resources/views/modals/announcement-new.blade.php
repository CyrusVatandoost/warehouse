<form method="POST" action="/announcement/create">

	{{ csrf_field() }}

	<!-- CSS for datepicker -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">  
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>  

	<div class="modal fade" id="modal-container-new-announcement" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">New Announcement</h4>
					 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
       				 </button>
				</div>

				<div class="modal-body">
					<div class="form-group">
						<label for="announcement_name">Name</label>
						<input type="text" class="form-control" id="announcement_name" name="announcement_name"/>
					</div>
      
    				<div class="form-group">
    					<label for="announcement_expiration">Expires on</label>
					    <input class="date form-control" type="text" id="announcement_expiration" name="announcement_expiration" placeholder="YYYY-MM-DD">  
					    <script type="text/javascript">  
					    	var currentDate = new Date();
							currentDate.setDate(currentDate.getDate() + 1);
					        $('.date').datepicker({  
					           	format: 'yyyy-mm-dd',
						      	todayHighlight: true,
						       	autoclose: true, 
						       	startDate: new Date(), 

					        });  
					    </script>  
    				</div>

					<div class="form-group">
						<label for="announcement_description">Description</label>
						<textarea class="form-control" rows="3" name="announcement_description"></textarea>
					</div>

				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button> 
					<button type="submit" class="btn btn-browse">Post Announcement</button>
				</div>

			</div>
		</div>
	</div>

</form>