<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Admin;
use App\File;
use App\FileArchive;
use App\User;
use App\Log;
use App\Organization;
use App\OrganizationPosition;
use App\OrganizationPositionUser;
use App\Project;
use App\FeaturedProject;
use App\ProjectArchive;
use App\MyThread;

class DashboardController extends Controller {

  public function index() {
    $admins = Admin::get();
    $users = User::get();
    $projects = Project::get();
    $project_archives = ProjectArchive::get();
    $files = File::get();
    $file_archives = FileArchive::get();
    $logs = Log::get();
    $messsages = MyThread::get();
    $organization = Organization::find(1);
    $organization_positions = OrganizationPosition::get();
    $organization_position_users = OrganizationPositionUser::get();
    return view('admin', compact(
      'users',
      'projects',
      'project_archives',
      'files',
      'file_archives',
      'admins',
      'messsages',
      'logs',
      'organization',
      'organization_positions',
      'organization_position_users'
    ));
  }

	public function users() {
    $users = User::get();

    $waitlists = DB::table('pending_users')
            ->select('pending_users.user_id', 'pending_users.first_name', 'pending_users.middle_initial', 'pending_users.last_name', 'pending_users.email')
            ->get();

    return view('admin.users', compact('users', 'waitlists'));
	}

	public function files() {

	}

	public function logs() {

	}

	public function organization() {
    $organization = Organization::find(1);
  	$admins = Admin::get();
  	$organization_positions = OrganizationPosition::get();
    $organization_position_users = OrganizationPositionUser::get();
    return view('admin.organization', compact('organization', 'admins', 'organization_positions', 'organization_position_users'));
	}

	public function projects() {
    $projects = Project::get();
    $featured_projects = FeaturedProject::get();
    $project_archives = ProjectArchive::get();
    return view('admin.projects', compact('projects', 'featured_projects', 'project_archives'));
	}

}
