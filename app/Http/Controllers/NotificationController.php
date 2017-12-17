<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use App\Log;
use App\User;

class NotificationController extends Controller
{
    //returns all notifications for a user sorted by date
    public function showNotifs() {
        $logs = Log::orderBy('created_at', 'DESC')->get()->where('user_id', auth()->id());;
        //$logs = Log::get()->where('user_id', auth()->id());
        return view('/notifications', compact('logs'));	//$logs
    }
}
