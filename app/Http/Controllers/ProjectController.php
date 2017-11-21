<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller {
    
    // returns all projects
	public function index() {
		$project_list = Project::get();
		return view('projects', compact('project_list'));
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
		$project = Project::find($id);
		return view('project', compact('project'));
	}

}
