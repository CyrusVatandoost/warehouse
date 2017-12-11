<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Log;
use App\User;

class LogController extends Controller {

  // returns all announcements sorted by date
  public function index() {
    $logs = Log::orderBy('created_at', 'DESC')->get();
    $users = User::get();
    return view('admin.logs', compact('logs', 'users'));	//$logs
  }

  // how to make this work?
  public function store($user_id, $user_action, $action_details) {
  	$log = new Log;
    $log->user_id = $user_id;
    $log->user_action = $user_action;
    $log->action_details = $action_details;
    $log->save();
  }

}
