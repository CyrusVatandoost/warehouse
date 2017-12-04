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
    $destinationPath = public_path('/avatars');
    $image->move($destinationPath, $input['name']);

    return back();

  }
  
}
