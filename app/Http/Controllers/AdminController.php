<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\Admin;
use App\Project;
use App\ProjectArchive;
use App\OrganizationPosition;
use App\ApprovedMail;
class AdminController extends Controller{
   
  public function show() {
  	$users = User::get();
  	$admins = Admin::get();
  	$projects = Project::get();
  	$project_archives = ProjectArchive::get();
  	$organization_positions = OrganizationPosition::get();
  	$waitlists = DB::table('waitlist')
            ->join('users', 'users.user_id', '=', 'waitlist.user_id')
            ->select('waitlist.user_id', 'users.first_name', 'users.middle_initial', 'users.last_name', 'users.email')
            ->get();
  	return view('admin', compact('users', 'admins', 'projects', 'project_archives', 'organization_positions', 'waitlists'));
  }

  public function approveUser($id, $email){
    $userWaitlist = DB::table('waitlist')->where('user_id', '=', $id)->first();
    if($userWaitlist == null){
      return redirect('/admin');
    }
    else{
      DB::table('waitlist')->where('user_id', '=', $id)->delete();
      //Mail::to($email)->send(new ApprovedMail()); //Commented out as not needed for testing, but its working
      return redirect('/admin');
    }
  }
}
