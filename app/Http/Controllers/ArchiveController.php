<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FileArchive;

class ArchiveController extends Controller {
	
  public function files() {
  	$file_archives = FileArchive::get();
  	return view('admin.archive.file', compact('file_archives'));
  }

}
