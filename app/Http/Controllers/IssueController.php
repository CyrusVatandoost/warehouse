<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Issue; 
use App\Log;
use App\Project;

class IssueController extends Controller {

	public function store($project_id) {
		$issue = new Issue;
		$issue->project_id = $project_id;
		$issue->created_by = auth()->id();
		$issue->name = request('issue_name');
		$issue->assigned_to = request('issue_assigned_to');

    $project = Project::find($project_id);
    $log = new Log;
    $log->user_id = auth()->id();
    $log->user_action = "created a issue in " . $project->name;
    $log->action_details = request('issue_name');

		$issue->save();
    $log->save();
    $project->save();
    return back();
	}

	public function setCompleteness($issue_id) {
		$issue = Issue::find($issue_id);

    if($issue->completed == 1) {
    	$issue->completed = 0;
    }
    else {
    	$issue->completed = 1;
    }

    $issue->save();
    return back();
	}

}
