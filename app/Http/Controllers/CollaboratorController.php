<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Collaborator;

class CollaboratorController extends Controller {
 
	public function store(Project $project) {

		/*
		$collaborator = new Collaboration;
		$collaborator->project_id = $project->project_id;
		$collaborator->user_id = request('user_id');
		$collaborator->save();
		*/

		Collaborator::create([
				'project_id' => $project->project_id,
				'user_id' => request('user_id')
		]);

		return back();
	}

}
