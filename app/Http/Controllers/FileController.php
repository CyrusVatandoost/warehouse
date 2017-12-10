<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use App\FileArchive;
use App\Log;
use App\Project;

class FileController extends Controller {

	public function store(Request $request, $project_id) {
		$upload = $request->file('file');
		$file = $upload->getClientOriginalName(); //Get Image Name
		$extension = $upload->getClientOriginalExtension();  //Get Image Extension
		$input['name'] = $file;
    $destinationPath = public_path('/storage/'.$project_id);
    $upload->move($destinationPath, $input['name']);

		$file = new File;
		$file->name =  $input['name'];
		$file->project_id = $project_id;
		$file->save();

		//add store action to logs table
        $log = new Log;
        $project = Project::find($project_id);

        $log->user_id = auth()->id();
        $log->user_action = "uploaded a file (" . $input['name'] . ") to";
        $log->action_details = $project->name;
        $log->save();
        //end log
 
		return back();
	}

	// this function deletes a file from the specified file_id and project_id
	public function delete($project_id, $file_id) {
		//add delete action to logs table
		$file = File::find($file_id);
        $log = new Log;
        $project = Project::find($project_id);

        $log->user_id = auth()->id();
        $log->user_action = "deleted a file (" . $file->name . ") from";
        $log->action_details = $project->name;
        $log->save();
        //end log

		File::where('project_id', $project_id)->where('file_id', $file_id)->delete();
		return back();
	}

	// this fuction archives a file from the specified file_id and project_id
	public function archive($project_id, $file_id) {
		//add archive action to logs table
		$file = File::find($file_id);
        $log = new Log;
		$project = Project::find($project_id);

        $log->user_id = auth()->id();
        $log->user_action = "archived a file (" . $file->name . ") from";
        $log->action_details = $project->name;
        $log->save();
        //end log

		$file = File::find($file_id);
		$file_archive = new FileArchive;
		$file_archive->project_id = $file->project_id;
		$file_archive->name = $file->name;
		$file_archive->save();
		$file->delete();
		return back();
	}

}
