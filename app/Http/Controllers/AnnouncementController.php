<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Announcement; 

class AnnouncementController extends Controller
{
    //returns all announcements
    public function index() {
        $announcements = Announcement::get();
        return view('home', compact('announcements'));
    }

    //returns a single announcement using an ID
    public function show($id) {
    	$announcement = Announcement::find($id);
    	return view('announcement', compact('announcement'));  //compact announcement = $announcement
    }

    //stores a new project in warehousedb.announcements
    public function store() {
    	$this->validate(request(), ['announcement_name'=>'required']);
    	$announcement = new Announcement;

    	$announcement->user_id = auth()->id();
    	$announcement->name = request('announcement_name');
    	$announcement->description = request('announcement_description');

    	$announcement->save();
    	return redirect('/home');
    }
}
