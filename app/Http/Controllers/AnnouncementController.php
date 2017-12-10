<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Announcement; 
use App\Log;

class AnnouncementController extends Controller
{
    //returns all announcements sorted by date
    public function index() {
        $announcements = Announcement::orderBy('created_at', 'DESC')->get();
        return view('home', compact('announcements'));
    }

    //returns a single announcement using an ID
    public function show($id) {
    	$announcement = Announcement::find($id);
    	return view('announcement', compact('announcement'));  //compact announcement = $announcement
    }

    //stores a new announcement in warehousedb.announcements
    public function store() {
    	$this->validate(request(), ['announcement_name'=>'required']);
    	$announcement = new Announcement;

    	$announcement->user_id = auth()->id();
    	$announcement->name = request('announcement_name');
    	$announcement->description = request('announcement_description');
        $announcement->expires_on = request('announcement_expiration');
        $announcement->visibility = 1;

    	$announcement->save();

        //add store action to logs table
        $log = new Log;

        $log->user_id = auth()->id();
        $log->user_action = "posted an announcement";
        $log->action_details = request('announcement_name');
        $log->save();
        //end log

    	return redirect('/home');
    }

    //deletes a single announcement using an ID
    public function delete($id) {
        $announcement = Announcement::find($id);
        $announcement->visibility = 0;

        //add delete action to logs table
        $log = new Log;

        $log->user_id = auth()->id();
        $log->user_action = "deleted an announcement";
        $log->action_details = $announcement->name;
        $log->save();
        //end log

        $announcement->save();

        return redirect('/home');
    }
}
