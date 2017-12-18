<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Project;

class EditorController extends Controller {

	public function store($id) {
		$project = Project::find($id);
		Storage::disk('uploads')->put($id.'/README.html', 'Contents');
		return redirect('project/'.$id);
	}

	public function edit($id) {
		$project = Project::get()->find($id);

		if(!file_exists(public_path('uploads/'.$id.'/README.html')))
			Storage::disk('uploads')->put($id.'/README.html', 'Contents');

		$file = Storage::disk('uploads')->get($id.'/README.html');
		return view('editor.file', compact('file', 'project'));
	}

	public function update($id) {
		$project = Project::find($id);
		$content = request('content');
		$file = Storage::disk('uploads')->put($id.'/README.html', $content);
		return redirect('project/'.$id);
	}

}
