<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use Input;
use App\User;

class UserController extends Controller {

 	public function updateAvatar(Request $request, $id) {
      $user = User::find($id)->first();

      /*
      $image = $request->file('profile_pic');
      $input['name'] = $id.'.'.$image->getClientOriginalExtension();
      $destinationPath = public_path('/storage/avatars');
      $image->move($destinationPath, $input['name']);
      */

      $upload = $request->file('profile_pic'); // get file from form
      $file_name = $upload->getClientOriginalName();  // get file name
      $file_extension = $upload->getClientOriginalExtension();  // get file extension

      $storage_path = Storage::disk('uploads')->putFileAs('avatars/', $upload, $id.'.'.$file_extension);

      return back();
  	}

    // updates the user's bio
  	public function updateBio($id) {
  		$user = User::find($id);
  		$user->bio = request('profile_bio');
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
      return redirect('/account');
    }
}
