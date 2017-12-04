<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProjectTag;
use App\Tag;
class TagController extends Controller
{
        	public function delete($project_id, $tag_id) {
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
				return back();
			}
	
}
