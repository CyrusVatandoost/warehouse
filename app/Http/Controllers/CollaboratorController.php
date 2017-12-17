<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Project;
use App\Collaborator;
use App\Log;

class CollaboratorController extends Controller {
 
	public function store($project_id) {
		$collaborator = new Collaborator;
		$collaborator->project_id = $project_id;
		$collaborator->user_id = request('user_id');
		$collaborator->save();

		//add store action to logs table
    $log = new Log;

    $log->user_id = auth()->id();
    $log->user_action = "added collaborator";
    $log->action_details = request('user_id');
    $log->save();
    //end log

		return back();
	}

	public function delete($project_id, $user_id) {
		//add delete action to logs table
    $log = new Log;

    $log->user_id = auth()->id();
    $log->user_action = "removed collaborator";
    $log->action_details = $user_id;
    $log->save();
    //end log

		Collaborator::where('project_id', $project_id)->where('user_id', $user_id)->delete();
		return back();
	}

}
