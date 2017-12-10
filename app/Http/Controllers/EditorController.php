<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Project;

class EditorController extends Controller {

	public function edit($id) {
		$project = Project::get()->find($id);
		$file = Storage::disk('uploads')->get($id.'/README.md');
		return view('editor.file', compact('file', 'project'));
	}

	public function update($id) {
		$project = Project::find($id);
		$content = request('content');
		$file = Storage::disk('uploads')->put($id.'/README.md', $content);
		return view('project', compact('project'));
	}

}
