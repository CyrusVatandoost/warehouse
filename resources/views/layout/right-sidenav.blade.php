@foreach(App\FeaturedProject::get() as $featured_project)
	<div class="card">
	  <div class="card-body">
	  	<h5><a href="/project/{{$featured_project->project_id}}">{{ $featured_project->project->name }}</a></h5>
	  	by: {{ $featured_project->project->user->first_name }} {{ $featured_project->project->user->last_name }}
	  </div>
	</div>
	<br>
@endforeach