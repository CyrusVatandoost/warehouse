<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Project;
use App\ProjectArchive;

class ProjectController extends Controller {
    
	public static $phrase = '';

	// returns all of the logged in user's project and all the site's projects
	public function index() {
		$my_projects = Project::get()->where('user_id', auth()->id());
		$all_projects = Project::get();
		return view('projects', compact('my_projects', 'all_projects'));
	}

	// returns incomplete projects
	public function incomplete() {
		$project_list = Project::incomplete()->get();
		return view('projects', compact('project_list'));
	}

	// returns incomplete projects
	public function complete() {
		$project_list = Project::complete()->get();
		return view('projects', compact('project_list'));
	}

	// returns projects that are public
	public function guest() {
		$projects = Project::public()->get();
		return view('project.guest', compact('projects'));
	}

	// returns a single project using an ID
	public function show($id) {
		$project = Project::find($id);
		return view('project', compact('project'));
}
	// stores a new project in warehousedb.projects
	public function store() {
		$this->validate(request(), [
			'project_name' => 'required'
		]);
		$project = new Project;
		$project->name = request('project_name');
		$project->user_id = auth()->id();
		$project->description = request('project_description');
		$project->save();
		return redirect('/projects');
	}

	// deletes a project using an id
	public function delete($id) {
		DB::table('projects')->where('project_id', $id)->delete();
		return redirect('/projects');
	}

	public function archive($id) {
		$project = Project::find($id);
		$project_archive = new ProjectArchive;
		$project_archive->name = $project->name;
		$project_archive->user_id = $project->project_id;
		$project_archive->description = $project->description;
		$project_archive->complete = $project->complete;
		$project_archive->public = $project->public;
		$project_archive->save();
		Project::find($id)->delete();
		return redirect('/projects');
	}

	// set completeness depending on the current completeness
	public function setCompleteness($id) {
		$project = Project::find($id)->first();
		if($project->complete == 1)
			$project->complete = 0;
		else
			$project->complete = 1;
		$project->save();
		return back();
	}

	// set visibility depending on current project's visibility
	public function setVisibility($id) {
		$project = Project::find($id)->first();
		if($project->public == 1)
			$project->public = 0;
		else
			$project->public = 1;
		$project->save();
		return back();
	}

	public function changeName($id) {
		$project = Project::find($id)->first();
		$project->name = request('name');
		$project->save();
		return back();
	}

	public function getAllPublicProjectsJSON(){
		$projects = DB::table('users')
            ->join('projects', 'projects.user_id', '=', 'users.user_id')
            ->select('users.first_name AS username', 'projects.project_id AS pID', 'projects.name AS pName', 'projects.public')
            ->where('projects.public', '=', 1)
            ->get();

		return $projects->toJson();
	}

	public function getUsersAndProjectsRelatedToPhrase(){

		$input = Input::all();
		self::$phrase = $input['search-project'];
		$searched = $input['search-project'];

		$projects = DB::table('users')
			->join('projects', 'projects.user_id', '=', 'users.user_id')
			->select('users.first_name AS username', 'projects.project_id AS pID', 'projects.name AS pName', 'projects.description', 'projects.public', 'projects.complete')
            ->where('projects.public', '=', 1)
            ->where(function ($query) {
                $query->where('projects.name', 'like', '%'.self::$phrase.'%')
                      ->orwhere('users.first_name', 'like', '%'.self::$phrase.'%');
            })->get();

        $usersresults = DB::table('users')
        	->select('users.user_id','users.first_name', 'users.last_name', 'users.email')
        	->where('users.first_name', 'like', '%'.self::$phrase.'%')
        	->orwhere('users.last_name', 'like', '%'.self::$phrase.'%')
        	->orwhere('users.email', 'like', '%'.self::$phrase.'%')
        	->get();

        $tags =  DB::table('tags')
        	->select('tag_id', 'name')
        	->get();


        return view('search', compact('projects', 'searched', 'usersresults', 'tags'));
	}

	public function getProjectsByTag(){
		$input = Input::all();
		$tag = $input['tag'];
		$searched = self::$phrase;
		
		$projects = DB::table('projects')
			->join('project_tags', 'project_tags.project_id', '=', 'projects.project_id')
			->join('users', 'users.user_id', '=', 'projects.user_id')
			->select('users.first_name AS username', 'projects.project_id AS pID', 'projects.name AS pName', 'projects.description', 'projects.public', 'projects.complete')
			->where('project_tags.tag_id', '=', $tag)
			->get();

		$tags =  DB::table('tags')
        	->select('tag_id', 'name')
        	->get();

        $usersresults = DB::table('users')
        	->select('users.user_id','users.first_name', 'users.last_name', 'users.email')
        	->where('users.first_name', 'like', '%'.self::$phrase.'%')
        	->orwhere('users.last_name', 'like', '%'.self::$phrase.'%')
        	->orwhere('users.email', 'like', '%'.self::$phrase.'%')
        	->get();

		return view('search', compact('projects', 'searched', 'usersresults', 'tags'));
	}

}
