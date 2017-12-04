<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;

class FileController extends Controller {

	public function store($id) {
		$file = new File;
		$file->name = request('file_name');
		$file->project_id = $id;
		$file->save();
	}

}
