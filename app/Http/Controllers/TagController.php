<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProjectTag;
class TagController extends Controller
{
        	public function delete($project_id, $tag_id) {
			ProjectTag::where('project_id', $project_id)->where('tag_id', $tag_id)->delete();
			return back();
	}
}
