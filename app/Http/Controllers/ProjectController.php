<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Project;

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

	// returns a single project using an ID
	public function show($id) {

		$project = DB::table('projects')->where('project_id', $id)->first();
		$files = DB::table('files')->where('project_id', $id)->get();
		
		return view('project', compact('project', 'files'));

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

}
