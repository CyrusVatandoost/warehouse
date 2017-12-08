<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Admin;
use App\Project;
use App\ProjectArchive;
use App\OrganizationPosition;

class AdminController extends Controller{
   
  public function show() {
  	$users = User::get();
  	$admins = Admin::get();
  	$projects = Project::get();
  	$project_archives = ProjectArchive::get();
  	$organization_positions = OrganizationPosition::get();
  	return view('admin', compact('users', 'admins', 'projects', 'project_archives', 'organization_positions'));
  }

}
