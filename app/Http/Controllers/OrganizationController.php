<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Organization;

class OrganizationController extends Controller{

	public function show() {
		# code...
		$admins = Admin::get();

		return view('organization', compact('admins'));
	}

	public function update($id) {
		$organization = Organization::find($id);
		$organization->name = request('name');
		$organization->email = request('email');
		$organization->save();
		return back();
	}

}
