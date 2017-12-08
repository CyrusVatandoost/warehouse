<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;

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

		return back();
	}

	// this function deletes a file from the specified file_id and project_id
	public function delete($project_id, $file_id) {
		File::where('project_id', $project_id)->where('file_id', $file_id)->delete();
		return back();
	}

}
