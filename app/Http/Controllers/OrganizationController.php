<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;

class OrganizationController extends Controller{

	public function show() {
		# code...
		$admins = Admin::get();

		return view('organization',compact('admins'));
	}


    //
}
