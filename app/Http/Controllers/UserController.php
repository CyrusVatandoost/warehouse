<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Storage;
use Input;
use Validator;
use App\User;
use App\Log;

class UserController extends Controller {

  public function store() {
    $user = new User;
    $user->first_name = request('first_name');
    $user->middle_initial = request('middle_initial');
    $user->last_name = request('last_name');
    $user->gender = request('gender');
    $user->email = request('email');
    $user->password = Hash::make(request('password'));
    $user->save();
    return back();
  }

  public function auth() {
    $user = User::find(Auth::id());
    return view('account', compact('user'));
  }

  public function edit() {
    $user = User::find(Auth::id());
    return view('account.edit', compact('user'));
  }

  public function settings() {
    $user = User::find(Auth::id());
    return view('account.settings', compact('user'));
  }

  public function history() {
    $user = User::find(Auth::id());
    return view('account.history', compact('user'));
  }

  public function show($id) {
    $user = User::find($id);
    return view('account', compact('user'));
  }

 	public function updateAvatar(Request $request, $id) {
    $user = User::find($id);
    $upload = $request->file('profile_pic'); // get file from form
    $file_name = $upload->getClientOriginalName();  // get file name
    $file_extension = $upload->getClientOriginalExtension();  // get file extension
    $storage_path = Storage::disk('uploads')->putFileAs('avatars/', $upload, $id.'.'.$file_extension);

    //add update action to logs table
    $log = new Log;
    $log->user_id = $id;
    if($user->gender == 'Male')
      $log->user_action = "updated his profile picture to";
    else
      $log->user_action = "updated her profile picture to";
    $log->action_details = $file_name;
    $log->save();
    //end log

    return back();
  	}

    // updates the user's bio
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

      $validator = Validator::make(
        array(
        'password' => request("password"),
        'controlPass' => request("password_confirmation")
      ),
        array(
        'controlPass' => 'required_with:password|same:password'
        ));

      if ($validator->fails()) {
        // The given data did not pass validation

        $messages = $validator->messages();

        echo $messages->first('password');

        return redirect('/account');

      } else {

        $password = request('password');

        $user = User::find($id);
        $user->first_name = request('first_name');
        $user->middle_initial = request('middle_initial');
        $user->last_name = request('last_name');
        $user->gender = request('gender');

        $hashed = Hash::make($password, ['rounds' => 12 ]);

        $user->password = $hashed;
        $user->save();

        //add update action to logs table
        $log = new Log;
        $log->user_id = $id;
        $log->user_action = "updated their profile";
        $log->action_details = "Personal Information";
        $log->save();
        //end log
        return redirect('/home');
      }
       

    }

  public function updateDetails() {
    $user = User::find(auth()->id());
    $user->first_name = request('first_name');
    $user->middle_initial = request('middle_initial');
    $user->last_name = request('last_name');
    $user->gender = request('gender');
    $user->email = request('email');
    $user->save();
    return back();
  }

  public function updatePassword() {

    $validator = Validator::make(
      array(
      'password' => request("password"),
      'controlPass' => request("password_confirmation")
      ),
      array(
      'controlPass' => 'required_with:password|same:password'
      ));
    if ($validator->fails()) {
      // The given data did not pass validation
      $messages = $validator->messages();
      echo $messages->first('password');
      return back();

    }
    else {
      $user = User::find(auth()->id());
      $user->password = Hash::make(request('password'));
      $user->save();
      return back();
    }

  }

}
