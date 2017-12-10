<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Project;
use App\ProjectArchive;
use App\Log;

class ProjectController extends Controller {
    
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
		$project = Project::find($id)->first();
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
		$project = Project::find($id)->first();
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
		$project = Project::find($id)->first();

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

}
