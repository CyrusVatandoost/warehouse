<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\Admin;
use App\Project;
use App\ProjectArchive;
use App\FileArchive;
use App\OrganizationPosition;
use App\ApprovedMail;
class AdminController extends Controller{
   
  public function show() {
  	$users = User::get();
  	$admins = Admin::get();
  	$projects = Project::get();
  	$project_archives = ProjectArchive::get();
  	$file_archives = FileArchive::get();
  	$organization_positions = OrganizationPosition::get();
  	$waitlists = DB::table('pending_users')
            ->select('pending_users.user_id', 'pending_users.first_name', 'pending_users.middle_initial', 'pending_users.last_name', 'pending_users.email')
            ->get();
  	return view('admin', compact('users', 'admins', 'projects', 'project_archives', 'file_archives', 'organization_positions', 'waitlists'));
  }

  public function showArchive() {
  	$file_archives = FileArchive::get();
  	return view('admin.archive', compact('file_archives'));
  }

  public function approveUser($id, $email){
    $userWaitlist = DB::table('pending_users')->where('user_id', '=', $id)->first();
    if($userWaitlist == null){
      return redirect('/admin');
    }
    else{
      DB::insert("insert into users
             select * from pending_users where user_id = $id");
      DB::table('pending_users')->where('user_id', '=', $id)->delete();
      //Mail::to($email)->send(new ApprovedMail()); //Commented out as not needed for testing, but its working
      return redirect('/admin');
    }
  }

  public function delete() {
      
      Admin::where('user_id',request('user_id'))->delete();

      User::where('user_id',request('user_id'))->delete();
      return back();
  }
  
}
