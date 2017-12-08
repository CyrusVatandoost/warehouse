@extends('layout.app')

@section('page-title', 'Organization')

@section('modals')
  @include('modals.new_project')
@endsection

<!-- left-sidenav -->
@section('left-sidenav')
  <p><a href="#modal-container-new-announcement" class="btn btn-primary btn-block" role="button" data-toggle="modal">New Announcement</a></p>
  <p><a href="#modal-container-new-project" role="button" class="btn btn-primary btn-block" data-toggle="modal">New Project</a></p>
@endsection

<!-- body -->
@section('body')
	<style type="text/css">
		.avatar {
		 	background-color: #bbbbbb;
		  	height: 80px;
		 	width: 80px;
		  	border-radius: 80px;
		}
		.card-size{
	        margin-right: 10px; 
	       	margin-bottom: 10px;
	       	width: 13em;
	       	height: 13em;
	       	border: 0;
    	}	
    	.card-group-size{
    		margin-right: 10px; 
	       	margin-bottom: 10px;
    	}
    	a, a:hover{
    		color: black;
    	}
	</style>
  @include('modals.new_project')
  <!-- insert body here -->  
    <div class="container">
        <div class="row">
            <div class="col-md-12">
				<div class="card card-group-size">
			    	<div class="card-header" role="tab" id="headingOne">
			      		<div class="mb-0">
			        		<a class="collapsed" data-toggle="collapse" data-parent="collapse" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
				            	<h3 class="text-center font-weight-light">WareHouse Administrators</h3>
			        		</a>
			      		</div>
			    	</div>

				    <div id="collapseOne" class="accordion-body collapse in" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="">
			     		<div class="accordion-inner">
				     		<div class="row no-gutters align-items-start">
								<div class="col-md-auto">
					     			 <div class="card card-size text-center">
                  						<div class="card-block">
                  							<img class="card-img-top" src="storage/user.png" alt="Card image" style="width: 64px;">
											<div class="card-body">
												<h4 class="card-title">Addie Meen</h4>
												<p class="card-text">Asst. Professor</p>
						        			</div>
						        		</div>
				        			</div>
								</div>
			      			</div>
			      		</div>
			    	</div>
				</div>

				<div class="col-md-12 text-center">
        			<h1><small> TE<sup>3</sup>D Organization List </small></h1>
        		</div>
				<div class="card card-group-size">
					<div class="card-header" role="tab" id="headingTwo">
				      <div class="mb-0">
				        <a data-toggle="collapse" data-parent="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
				        	<h3 class="text-center font-weight-light">Fellows</h3>
				        </a>
				      </div>
				    </div>
				    <div id="collapseTwo" class="accordion-body collapse in" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false">
					    <div class="accordion-inner">
					    	<div class="row no-gutters align-items-start">
								<div class="col-md-auto">
					     			 <div class="card card-size text-center">
                  						<div class="card-block">
                  							<img class="card-img-top" src="storage/user.png" alt="Card image" style="width: 64px;">
											<div class="card-body">
												<h4 class="card-title">Edgar Allan Poe</h4>
												<p class="card-text">Full Professor</p>
						        			</div>
						        		</div>
				        			</div>
								</div>
								<div class="col-md-auto">
					     			 <div class="card card-size text-center">
                  						<div class="card-block">
                  							<img class="card-img-top" src="storage/user.png" alt="Card image" style="width: 64px;">
											<div class="card-body">
												<h4 class="card-title">Addie Meen</h4>
												<p class="card-text">Asst. Professor</p>
						        			</div>
						        		</div>
				        			</div>
								</div>
								<div class="col-md-auto">
					     			 <div class="card card-size text-center">
                  						<div class="card-block">
                  							<img class="card-img-top" src="storage/user.png" alt="Card image" style="width: 64px;">
											<div class="card-body">
												<h4 class="card-title">Dora The Sr.</h4>
												<p class="card-text">Asst. Professor</p>
						        			</div>
						        		</div>
				        			</div>
								</div>
			      			</div>
					    </div>
					</div>
				</div>
				<p>
			  	<div class="card card-group-size">
					<div class="card-header" role="tab" id="headingThree">
				    	<div class="mb-0">
				        	<a data-toggle="collapse" data-parent="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
				        		<h3 class="text-center font-weight-light">Researchers</h3>
				        	</a>
				      	</div>
				    </div>
				    <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false">
				    	<div class="accordion-inner">
					      <div class="row no-gutters align-items-start">
								<div class="col-md-auto">
					     			 <div class="card card-size text-center">
                  						<div class="card-block">
                  							<img class="card-img-top" src="storage/user.png" alt="Card image" style="width: 64px;">
											<div class="card-body">
												<h4 class="card-title">Bam Ano Jr.</h4>
												<p class="card-text">Full Professor</p>
						        			</div>
						        		</div>
				        			</div>
								</div>
								<div class="col-md-auto">
					     			 <div class="card card-size text-center">
                  						<div class="card-block">
                  							<img class="card-img-top" src="storage/user.png" alt="Card image" style="width: 64px;">
											<div class="card-body">
												<h4 class="card-title">Anya Baranovskaya</h4>
												<p class="card-text">Asst. Professor</p>
						        			</div>
						        		</div>
				        			</div>
								</div>
								<div class="col-md-auto">
					     			 <div class="card card-size text-center">
                  						<div class="card-block">
                  							<img class="card-img-top" src="storage/user.png" alt="Card image" style="width: 64px;">
											<div class="card-body">
												<h4 class="card-title">Dora The Jr.</h4>
												<p class="card-text">Asst. Professor</p>
						        			</div>
						        		</div>
				        			</div>
								</div>
								<div class="col-md-auto">
					     			 <div class="card card-size text-center">
                  						<div class="card-block">
                  							<img class="card-img-top" src="storage/user.png" alt="Card image" style="width: 64px;">
											<div class="card-body">
												<h4 class="card-title">Freddie Wong Jr.</h4>
												<p class="card-text">Full Professor</p>
						        			</div>
						        		</div>
				        			</div>
								</div>
								<div class="col-md-auto">
					     			 <div class="card card-size text-center">
                  						<div class="card-block">
                  							<img class="card-img-top" src="storage/user.png" alt="Card image" style="width: 64px;">
											<div class="card-body">
												<h4 class="card-title">Jenny Woe</h4>
												<p class="card-text">Full Professor</p>
						        			</div>
						        		</div>
				        			</div>
								</div>
								<div class="col-md-auto">
					     			 <div class="card card-size text-center">
                  						<div class="card-block">
                  							<img class="card-img-top" src="storage/user.png" alt="Card image" style="width: 64px;">
											<div class="card-body">
												<h4 class="card-title">Mogi Takahashi Yobe</h4>
												<p class="card-text">Full Professor</p>
						        			</div>
						        		</div>
				        			</div>
								</div>
								<div class="col-md-auto">
					     			 <div class="card card-size text-center">
                  						<div class="card-block">
                  							<img class="card-img-top" src="storage/user.png" alt="Card image" style="width: 64px;">
											<div class="card-body">
												<h4 class="card-title">Zig Zag</h4>
												<p class="card-text">Asst. Professor</p>
						        			</div>
						        		</div>
				        			</div>
								</div>
			      			</div>
					    </div>
				    </div>
				</div>
			</p>
        	</div>
		</div>
	</div>
@endsection

<!-- right-sidenav -->
@section('right-sidenav')
  <!-- insert featured projects here -->
  @include('layout.right-sidenav')
@endsection
