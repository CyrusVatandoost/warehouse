<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Collaborator;

class CollaboratorController extends Controller {
 
	public function store($project_id) {

		$collaborator = new Collaborator;
		$collaborator->project_id = $project_id;
		$collaborator->user_id = request('user_id');
		$collaborator->save();

		return back();
		
	}

}
