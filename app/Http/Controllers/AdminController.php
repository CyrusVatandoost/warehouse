<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Admin;
use App\Project;

class AdminController extends Controller{
   
  public function show() {
  	$users = User::get();
  	$admins = Admin::get();
  	$projects = Project::get();
  	return view('admin', compact('users', 'admins', 'projects'));
  }

}
