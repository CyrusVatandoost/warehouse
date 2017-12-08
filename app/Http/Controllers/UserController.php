<?php

namespace App\Http\Controllers;

use Storage;
use Input;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller {

 	public function updateAvatar(Request $request, $id) {
    $user = User::find($id)->first();

    $image = $request->file('profile_pic');
    $input['name'] = $id.'.'.$image->getClientOriginalExtension();
    $destinationPath = public_path('/storage/avatars');
    $image->move($destinationPath, $input['name']);

    return back();
  	}

  	public function updateBio($id) {
  		$user = User::find($id);

  		$user->bio = request('profile_bio');

  		$user->save();
  		return redirect ('/account');
  	}
   
}
