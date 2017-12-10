<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\File;
use App\FileArchive;

class FileController extends Controller {

	public function store(Request $request, $project_id) {
		$upload = $request->file('file');	// get file from form
		$file_name = $upload->getClientOriginalName();	// get file name
		$file_extension = $upload->getClientOriginalExtension();	// get file extension

		$storage_path = Storage::disk('uploads')->put($project_id, $upload);	// upload file to folder called $project_id
		$storage_name = basename($storage_path);

		$file = new File;
		$file->name =  $storage_name;
		$file->project_id = $project_id;
		$file->save();

		return back();
	}

	// this function deletes a file from the specified file_id and project_id
	public function delete($project_id, $file_id) {
		File::where('project_id', $project_id)->where('file_id', $file_id)->delete();
		return back();
	}

	// this fuction archives a file from the specified file_id and project_id
	public function archive($project_id, $file_id) {
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

}
