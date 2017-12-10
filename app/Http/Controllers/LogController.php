<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Log;
use App\User;

class LogController extends Controller
{
    //returns all announcements sorted by date
    public function index() {
        $logs = Log::orderBy('created_at', 'ASC')->get();
        $users = User::get();
        return view('admin.logs', compact('logs', 'users'));	//$logs

    }

    //returns a single user based on given id
    public function getUser($id) {
    	$user = User::find($id);
    	return $user->first_name;
    }
}
