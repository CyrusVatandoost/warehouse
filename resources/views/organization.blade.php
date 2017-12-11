	@extends('layout.app')

@section('title', 'Organization')
@section('page-title', 'Organization')

@section('modals')
  @include('modals.new_project')
  @include('modals.announcement-new')
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

			    @foreach(App\Admin::get() as $admin)
				    <div id="collapseOne" class="accordion-body collapse in" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="">
			     		<div class="accordion-inner">
				     		<div class="row no-gutters align-items-start">
								<div class="col-md-auto">
				     			 <div class="card card-size text-center">
          						<div class="card-block">

          							@if (file_exists(public_path('uploads/avatars/'.$admin->user->user_id.'.jpg')))
          								<img class="rounded-circle" src="{{ asset('uploads/avatars/'.$admin->user->user_id.'.jpg') }}" height="64" width="64">
       									@else
          								<img class="rounded-circle" src="{{ asset('uploads/avatars/default.jpg') }}" height="64" width="64">
        								@endif

											<div class="card-body">
												<h4 class="card-title">{{$admin->user->first_name}} &nbsp;{{$admin->user->last_name }}</h4>
												<p class="card-text">{{$admin->user->organizationPosition->position->name}}</p>
						        			</div>
						        		</div>
				        			</div>
								</div>
			      			</div>
			      		</div> <!-- stops here -->
			      	@endforeach
			    	</div>
				</div>

				<div class="col-md-12 text-center">
        			<h1><small> TE<sup>3</sup>D Organization List </small></h1>
        		</div>
        		
        		@foreach(App\OrganizationPosition::get() as $position)
				<div class="card card-group-size">
					<div class="card-header" role="tab" id="headingTwo">
				      <div class="mb-0">
				        <a data-toggle="collapse" data-parent="collapse" href="#collapse{{$position->organization_position_id}}" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
				        	<h3 class="text-center font-weight-light">{{$position->name}}</h3>
				        </a>
				      </div>
				    </div>	
				    <div id="collapse{{$position->organization_position_id}}" class="accordion-body collapse in" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false">
					    <div class="accordion-inner">
					    	<div class="row no-gutters align-items-start">
									<div class="col-md-auto">
										<div class="card card-size text-center">
											@foreach($position->position as $user)
											<div class="card-block">

												@if (file_exists(public_path('uploads/avatars/'.$user->user_id.'.jpg')))
													<img class="rounded-circle" src="{{ asset('uploads/avatars/'.$user->user_id.'.jpg') }}" height="64" width="64">
												@else
													<img class="rounded-circle" src="{{ asset('uploads/avatars/default.jpg') }}" height="64" width="64">
												@endif

												<div class="card-body">
													<h4 class="card-title">
														<a href="/account/{{$user->user_id}}">{{$user->role->first_name}}&nbsp;{{$user->role->last_name}}</a>
													</h4>
												</div>

											</div>
											@endforeach
										</div>
								</div>
			      			</div>
					    </div>
					</div>
				</div>
				@endforeach
				<p>
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
