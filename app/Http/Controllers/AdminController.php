<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Admin;
use App\Project;
use App\ProjectArchive;
use App\FileArchive;

class AdminController extends Controller{
   
  public function show() {
  	$users = User::get();
  	$admins = Admin::get();
  	$projects = Project::get();
  	$project_archives = ProjectArchive::get();
  	$file_archives = FileArchive::get();
  	return view('admin', compact('users', 'admins', 'projects', 'project_archives', 'file_archives'));
  }

}
