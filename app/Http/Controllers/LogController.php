<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Log;
use App\User;

class LogController extends Controller
{
    //returns all announcements sorted by date
    public function index() {
        $logs = Log::orderBy('created_at', 'DESC')->get();
        $users = User::get();
        return view('admin.logs', compact('logs', 'users'));	//$logs

    }
}
