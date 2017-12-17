<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProjectHead;

class ProjectHeadController extends Controller{

	public function store($id) {
		$project_head = new ProjectHead;
		$project_head->project_id = $id;
		$project_head->user_id = request('user_id');
		$project_head->save();
		return back();
	}

	public function remove($project_id, $user_id) {
		ProjectHead::where('project_id', $project_id)->where('user_id', $user_id)->delete();
		return back();
	}

}
