<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProjectTag;
use App\Tag;
use App\Project;
use App\Log;

class TagController extends Controller
{
        	public function delete($project_id, $tag_id) {

    		//add store action to logs table
		        $log = new Log;
		        $project = Project::find($project_id);
		        $tag = Tag::find($tag_id);

		        $log->user_id = auth()->id();
		        $log->user_action = "removed a tag (#" . $tag->name . ") from";
		        $log->action_details = $project->name;
		        $log->save();
		        //end log

			ProjectTag::where('project_id', $project_id)->where('tag_id', $tag_id)->delete();
			return back();
			}

		 	public function store($project_id)
			{
				$Tag = new Tag;
				$Tag->name = request('tag_name');
				$Tag->save();

				$ProjectTag = new ProjectTag;
				$ProjectTag->project_id = $project_id;
				$ProjectTag->tag_id = Tag::latest()->first()->tag_id;
				$ProjectTag->save();

				//add store action to logs table
		        $log = new Log;
		        $project = Project::find($project_id);

		        $log->user_id = auth()->id();
		        $log->user_action = "added a tag (#" . request('tag_name') . ") to";
		        $log->action_details = $project->name;
		        $log->save();
		        //end log

				return back();
			}
	
}
