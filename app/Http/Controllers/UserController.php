<?php

namespace App\Http\Controllers;

use Storage;
use Input;
use App\User;
use App\Log;
use Illuminate\Http\Request;

class UserController extends Controller {

 	public function updateAvatar(Request $request, $id) {
    $user = User::find($id);

    $image = $request->file('profile_pic');
    $input['name'] = $id.'.'.$image->getClientOriginalExtension();
    $destinationPath = public_path('/storage/avatars');
    $image->move($destinationPath, $input['name']);

    //add update action to logs table
    $log = new Log;

    $log->user_id = $id;
    if($user->gender == 'Male')
      $log->user_action = "updated his profile picture to";
    else
      $log->user_action = "updated her profile picture to";

    $log->action_details = $image;
    $log->save();
    //end log

    return back();
  	}

  	public function updateBio($id) {
  		$user = User::find($id);

  		$user->bio = request('profile_bio');

      //add update action to logs table
      $log = new Log;

      $log->user_id = $id;
      if($user->gender == 'Male')
        $log->user_action = "updated his profile";
      else if($user->gender == 'Female')
        $log->user_action = "updated her profile";
      $log->action_details = "Biography";
      $log->save();
      //end log

  		$user->save();
  		return redirect ('/account');
  	}
   
    // updates a user's first_name, middle_initial, last_name, and gender
    // cannot update email and password yet (requires verification)
    public function updatePersonalInfo($id) {
      $user = User::find($id);

      $user->first_name = request('first_name');
      $user->middle_initial = request('middle_initial');
      $user->last_name = request('last_name');
      $user->gender = request('gender');

      $user->save();

      //add update action to logs table
      $log = new Log;

      $log->user_id = $id;

      // NOTE: For some reason, gender isn't working here, but it works with updateBio(). Instead of going with "him" or "her", i went with "their" at the moment.

      // if($user->gender == 'Male')
      //   $log->user_action = "updated his profile";
      // else if($user->gender == 'Female')
      //   $log->user_action = "updated her profile";

      $log->user_action = "updated their profile";
      $log->action_details = "Personal Information";
      $log->save();
      //end log

      return redirect('/account');
    }
}
