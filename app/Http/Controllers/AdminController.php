<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Admin;
use App\ApprovedMail;
use App\FileArchive;
use App\Organization;
use App\OrganizationPosition;
use App\OrganizationPositionUser;
use App\Project;
use App\FeaturedProject;
use App\ProjectArchive;
use App\User;

class AdminController extends Controller{
   
  public function show() {
  	$users = User::get();
  	$admins = Admin::get();
  	$projects = Project::get();
  	$project_archives = ProjectArchive::get();
  	$file_archives = FileArchive::get();
  	$organization_positions = OrganizationPosition::get();
    $organization_position_users = OrganizationPositionUser::get();

  	$waitlists = DB::table('pending_users')
            ->select('pending_users.user_id', 'pending_users.first_name', 'pending_users.middle_initial', 'pending_users.last_name', 'pending_users.email')
            ->get();
  	return view('admin', compact('users', 'admins', 'projects', 'project_archives', 'file_archives', 'organization_positions', 'waitlists','organization_position_users'));
  }

  public function showArchive() {
  	$file_archives = FileArchive::get();
  	return view('admin.archive.file', compact('file_archives'));
  }

  public function approveUser($id, $email){
    $userWaitlist = DB::table('pending_users')->where('user_id', '=', $id)->first();
    if($userWaitlist == null) {
      return redirect('/admin');
    }
    else {
      DB::insert("insert into users
             select * from pending_users where user_id = $id");
      DB::table('pending_users')->where('user_id', '=', $id)->delete();
      //Mail::to($email)->send(new ApprovedMail()); //Commented out as not needed for testing, but its working
      return redirect('/admin');
    }

  }

  public function disapproveUser($id, $email){
    $userWaitlist = DB::table('pending_users')->where('user_id', '=', $id)->first();
    if($userWaitlist == null) {
      return redirect('/admin');
    }
    else{
      DB::table('pending_users')->where('user_id', '=', $id)->delete();
      //Mail::to($email)->send(new DisapprovedMail()); //Commented out as not needed for testing, but its working
      return redirect('/admin');
    }
  }

  public function store() {
		$Admin = new Admin;
  	$Admin->user_id = request('user_id');
  	$Admin->save();
  	return back();
  }

  public function delete() {
    Admin::where('user_id',request('user_id'))->delete();
    User::where('user_id',request('user_id'))->delete();
    return back();
  }

  public function showProjects() {
    $projects = Project::get();
    $featured_projects = FeaturedProject::get();
    $project_archives = ProjectArchive::get();
    return view('admin.projects', compact('projects', 'featured_projects', 'project_archives'));
  }

  public function showUsers() {
    $users = User::get();
    return view('admin.users', compact('users'));
  }

  public function organizationDashboard() {
    $organization = Organization::find(1);
    return view('admin.organization', compact('organization'));
  }

    public function addPosition() {
    # code...

    $OrganizationPositionUser = new OrganizationPositionUser;
    $OrganizationPositionUser->user_id = request('user_id');
    $OrganizationPositionUser->organization_position_id = request('position_id');

    $OrganizationPositionUser->save();

    return back();
  }

  public function deletePosition($id) {
      OrganizationPositionUser::where('organization_position_user_id', $id)->delete();
      return back();
  }


  
}
