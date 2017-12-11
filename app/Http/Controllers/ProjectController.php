<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use App\Project;
use App\ProjectArchive;
use App\Log;
use App\Task;
use App\User;
use App\FeaturedProject;

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
		$tasks = Task::get();
		$users = User::get();
		return view('project', compact('project', 'tasks', 'users'));
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

		//add store action to logs table
        $log = new Log;

        $log->user_id = auth()->id();
        $log->user_action = "created a project";
        $log->action_details = request('project_name');
        $log->save();
        //end log

		return redirect('/projects');
	}

	// deletes a project using an id
	public function delete($id) {
		//add delete action to logs table
    $log = new Log;
    $project = Project::find($id);

    $log->user_id = auth()->id();
    $log->user_action = "deleted a project";
    $log->action_details = $project->name;
    $log->save();
    //end log

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

		//add archive action to logs table
    $log = new Log;
    
    $log->user_id = auth()->id();
    $log->user_action = "archived a project";
    $log->action_details = $project->name;
    $log->save();
    //end log

		Project::find($id)->delete();
		return redirect('/projects');
	}

	// set completeness depending on the current completeness
	public function setCompleteness($id) {
		$project = Project::find($id);
    $log = new Log;

		if($project->complete == 1) {
			$project->complete = 0;

			//logs
			$log->user_id = auth()->id();
	        $log->user_action = "changed project status to incomplete";
	        $log->action_details = $project->name;
		}
		else {
			$project->complete = 1; 

			$log->user_id = auth()->id();
	        $log->user_action = "changed project status to complete";
	        $log->action_details = $project->name;
		}

		$project->save();
		$log->save();

		return back();
	}

	// set visibility depending on current project's visibility
	public function setVisibility($id) {
		$project = Project::find($id);
		$log = new Log;

		if($project->public == 1) {
			$project->public = 0;

			//logs
			$log->user_id = auth()->id();
      $log->user_action = "changed project visibility to private";
      $log->action_details = $project->name;
		}
		else {
			$project->public = 1;

			$log->user_id = auth()->id();
      $log->user_action = "changed project visibility to public";
      $log->action_details = $project->name;
		}

		$project->save();
		$log->save();

		return back();
	}

	public function changeName($id) {
		$project = Project::find($id);

		//add change name action to logs table
    $log = new Log;
    $log->user_id = auth()->id();
    $msg = "changed project name from " . $project->name . " to";
    $log->user_action = $msg;
    $log->action_details = request('name');
    //end log

    $project->name = request('name');

		$project->save();
		$log->save();

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

	public function getUsersAndProjectsRelatedToPhrase() {

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

	public function storeAbstract($id) {
		$project = Project::find($id);
		Storage::disk('uploads')->put($id.'/README.html', 'Contents');
		return back();
	}

	public function feature($id) {
		$project = Project::find($id);
		$featured_project = new FeaturedProject;
		$featured_project->project_id = $id;
		$featured_project->save();

		//add change name action to logs table
    $log = new Log;
    $log->user_id = auth()->id();
    $log->user_action = "featured";
    $log->action_details = $project->name;
    $log->save();
    //end log

		return back();
	}

	public function unfeature($id) {
		$featured_project = FeaturedProject::where('project_id', $id)->first();

		//add change name action to logs table
    $log = new Log;
    $log->user_id = auth()->id();
    $log->user_action = "unfeatured";
    $name = $featured_project->project->name;
    $log->action_details = $name;
    $log->save();
    //end log

		$featured_project->delete();
		return back();
	}

}
