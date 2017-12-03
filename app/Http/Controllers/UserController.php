<?php

namespace App\Http\Controllers;

use Storage;
use Input;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller {

 	public function updateAvatar(Request $request, $id) {
    $user = User::find($id)->first();

    Storage::disk('local')->put(
    	'avatars/'.$id.'.jpg',
      file_get_contents($request->file('profile_pic')->getRealPath())
    );

    return back();

  }

}
