<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\File;
use App\FileArchive;
use App\Log;
use App\Project;

class FileController extends Controller {

	public function store(Request $request, $project_id) {
		$upload = $request->file('file');	// get file from form
		$file_name = $upload->getClientOriginalName();	// get file name
		$file_extension = $upload->getClientOriginalExtension();	// get file extension

		$storage_path = Storage::disk('uploads')->put($project_id, $upload);	// upload file to folder called $project_id
		$storage_name = basename($storage_path);

		Storage::disk('uploads')->move($project_id.'/'.$storage_name, $project_id.'/'.$file_name);

		$file = new File;
		$file->name = $file_name;
		$file->project_id = $project_id;
		$file->save();
		
		//add store action to logs table
    $log = new Log;
    $project = Project::find($project_id);
    $log->user_id = auth()->id();
    $log->user_action = "uploaded a file (" . $storage_name . ") to";
    $log->action_details = $project->name;
    $log->save();
    //end log
 
		return back();
	}

	// this function deletes a file from the specified file_id and project_id
	public function delete($project_id, $file_id) {
		//add delete action to logs table
		$file = File::find($file_id);
    $project = Project::find($project_id);

    $log = new Log;
    $log->user_id = auth()->id();
    $log->user_action = "deleted a file (" . $file->name . ") from";
    $log->action_details = $project->name;
    $log->save();

		File::where('project_id', $project_id)->where('file_id', $file_id)->delete();
		return back();
	}

	// this fuction archives a file from the specified file_id and project_id
	public function archive($project_id, $file_id) {
		//add archive action to logs table
		$file = File::find($file_id);
		$project = Project::find($project_id);

    $log = new Log;
    $log->user_id = auth()->id();
    $log->user_action = "archived a file (" . $file->name . ") from";
    $log->action_details = $project->name;
    $log->save();

		$file = File::find($file_id);
		$file_archive = new FileArchive;
		$file_archive->project_id = $file->project_id;
		$file_archive->name = $file->name;
		// the file will be moved to the archive folder
		Storage::disk('uploads')->move($project_id.'/'.$file->name, 'archive/'.$file->name);
		$file_archive->save();
		$file->delete();
		return back();
	}

	public function deleteArchive($file_archive_id) {
		$file_archive = FileArchive::find($file_archive_id);
		Storage::disk('uploads')->delete('archive/'.$file_archive->name);
		$file_archive->delete();
		return back();
	}

	public function restoreArchive($file_archive_id) {
		$file_archive = FileArchive::find($file_archive_id);
		$file = new File;
		$file->project_id = $file_archive->project_id;
		$file->name = $file_archive->name;
		// the file will be moved to the archive folder
		Storage::disk('uploads')->move('archive/'.$file->name, $file->project_id.'/'.$file->name);
		$file_archive->delete();
		$file->save();
		return back();
	}

	public function updateBanner(Request $request, $id) {
		$upload = $request->file('file');	// get file from form
		$file_name = $upload->getClientOriginalName();	// get file name
		$file_extension = $upload->getClientOriginalExtension();	// get file extension

		//$storage_path = Storage::disk('uploads')->put($id, $upload);
		Storage::disk('uploads')->putFileAs($id, $upload, 'banner.jpg');
 
		return back();
	}

	public function rename($project_id, $file_id) {
 		$new_name = request('name');
 		$file = File::find($file_id);
 		$file_name = $file->name;
		Storage::disk('uploads')->move($project_id.'/'.$file_name, $project_id.'/'.$new_name);
		$file->name = $new_name;
		$file->save();
		return back();
	}

}
