<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogController extends Controller
{
    //returns all announcements sorted by date
    public function index() {
        $logs = Log::orderBy('created_at', 'DESC')->get();
        return view('logs', compact('logs'));	//$logs
    }
}
