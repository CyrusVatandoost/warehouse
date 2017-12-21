@foreach(App\FeaturedProject::get() as $featured_project)
	<div class="card">
	  <div class="card-body">
	  	<h5><a class="text-dark" href="/project/{{$featured_project->project_id}}">{{ $featured_project->project->name }}</a></h5>
	  	by: <a class="text-dark" href="/account/{{$featured_project->project->user->user_id}}">{{ $featured_project->project->user->first_name }} {{ $featured_project->project->user->middle_initial }} {{ $featured_project->project->user->last_name }}</a>
	  </div>
	</div>
	<br>
@endforeach