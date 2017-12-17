<!-- DO NOT DELETE THIS FILE -->

<!-- this page follows this layout -->
<!-- i suggest make all new pages follow this layout -->
@extends('layout.app')

<!-- title at tab -->
@section('title', 'Admin Dashboard')
<!-- title at body -->
@section('page-title', 'Admin Dashboard')

<!-- css styles -->
@section('style')
	<!-- insert custom css styles here -->
	<!-- i suggest to avoid custom css styles and have it in the .css file in `public/css` -->
@endsection

<!-- modals -->
@section('modals')
  @include('modals.announcement-new')
  @include('modals.project-new')
@endsection

<!-- left-sidenav -->
@section('left-sidenav')

@endsection

@section('body')

	<div class="card-deck">

		<!-- users card -->
			<div class="card text-white bg-primary">
				<a href="/admin/users" class="text-white">
			    <div class="card-content">
		        <div class="card-body">
		          <div class="media d-flex">
		            <div class="align-self-center">
		              <i class="material-icons md-48">person</i>
		            </div>
		            <div class="media-body text-right">
		              <h3>{{ $users->count() }}</h3>
		              <span>Users</span>
		            </div>
		          </div>
		        </div>
			    </div>
				</a>
			</div>

		<!-- projects card -->
		<div class="card text-white bg-primary">
			<a href="/admin/projects" class="text-white">
		    <div class="card-content">
	        <div class="card-body">
	          <div class="media d-flex">
	            <div class="align-self-center">
	              <i class="material-icons md-48">create</i>
	            </div>
	            <div class="media-body text-right">
	              <h3>{{ $projects->count() }}</h3>
	              <span>Projects</span>
	            </div>
	          </div>
	        </div>
		    </div>
		  </a>
		</div>

		<!-- files card -->
		<div class="card text-white bg-primary">
	    <div class="card-content">
        <div class="card-body">
          <div class="media d-flex">
            <div class="align-self-center">
              <i class="material-icons md-48">folder</i>
            </div>
            <div class="media-body text-right">
              <h3>{{ $files->count() }}</h3>
              <span>Files</span>
            </div>
          </div>
        </div>
	    </div>
		</div>

	</div>
	<br>
		<div class="card-deck">

		<!-- users card -->
			<div class="card text-white bg-primary">
				<a href="/admin/users" class="text-white">
			    <div class="card-content">
		        <div class="card-body">
		          <div class="media d-flex">
		            <div class="align-self-center">
		              <i class="material-icons md-48">event_note</i>
		            </div>
		            <div class="media-body text-right">
		              <h3>{{ $announcements->count() }}</h3>
		              <span>Annoucements</span>
		            </div>
		          </div>
		        </div>
			    </div>
				</a>
			</div>

		<!-- logs card -->
		<div class="card text-white bg-primary">
			<a href="/admin/logs" class="text-white">
		    <div class="card-content">
	        <div class="card-body">
	          <div class="media d-flex">
	            <div class="align-self-center">
	              <i class="material-icons md-48">sms_failed</i>
	            </div>
	            <div class="media-body text-right">
	              <h3>{{ $logs->count() }}</h3>
	              <span>Logs</span>
	            </div>
	          </div>
	        </div>
		    </div>
		  </a>
		</div>

		<div class="card text-white bg-primary">
	    <div class="card-content">
        <div class="card-body">
          <div class="media d-flex">
            <div class="align-self-center">
              <i class="material-icons md-48">chat</i>
            </div>
            <div class="media-body text-right">
              <h3>{{ $messsages->count() }}</h3>
              <span>Messages</span>
            </div>
          </div>
        </div>
	    </div>
		</div>

	</div>

	<br>

	<div class="card-deck">

  	<div class="card">
  		<h4 class="card-header"><a href="/admin/users">Users</a></h4>
		  <div class="card-body">
		    <p class="card-text">
		    	Users: {{ $users->count() }}<br>
		    	Active users: {{ App\User::active()->count() }}<br>
		    	New users: {{ App\User::new()->count() }}
		    </p>
		  </div>
      <div class="card-footer">
      	<a href="/admin/users" class="btn btn-primary">Create User</a>
      </div>
		</div>

		<div class="card">
  		<h4 class="card-header"><a href="/admin/projects">Projects</a></h4>
		  <div class="card-body">
		    <p class="card-text">
		    	Projects: {{ $projects->count() }}<br>
		    	Completed projects: {{ $projects->where('completed', 1)->count() }}<br>
		    	Inprogress projects: {{ $projects->where('completed', 0)->count() }}<br>
		    	Public projects: {{ $projects->where('public', 1)->count() }}<br>
		    	Private projects: {{ $projects->where('public', 0)->count() }}<br>
		    </p>
		  </div>
      <div class="card-footer">
      	<a href="/projects" class="btn btn-primary">Create Project</a>
      </div>
		</div>

		<div class="card">
  		<h4 class="card-header"><a href="/admin/organization">Settings</a></h4>
		  <div class="card-body">
		    <p class="card-text">
		    	Name: {{ $organization->name }}<br>
		    	Email: {{ $organization->email}}
		    </p>
		  </div>
		</div>

	</div>
	<br>
	<div class="card-deck">

		<div class="card">
  		<h4 class="card-header"><a href="/admin/logs">Logs</a></h4>
		  <div class="card-body">
		    <p class="card-text">
		    	<!-- -->
		    	Logs: {{ $logs->count() }}
		    </p>
		  </div>
		</div>

		<div class="card">
  		<h4 class="card-header"><a href="#">Messages</a></h4>
		  <div class="card-body">
		    <p class="card-text">
		    	Messages: {{ $messsages->count() }}
		    </p>
		  </div>
		</div>

		<div class="card">
  		<h4 class="card-header"><a href="/admin/file-archive">File Archive</a></h4>
		  <div class="card-body">
		    <p class="card-text">
		    	<!-- -->
		    	Files: {{ $files->count() }}
		    </p>
		  </div>
		</div>

	</div>

	<br>

	<!--
	-->

@endsection

<!-- right-sidenav -->
@section('right-sidenav')
  <!-- insert featured projects here -->
  @include('layout.right-sidenav') <!-- you can remove this if you do not want the featured projects to be shown -->
@endsection