<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrganizationPosition;

class OrganizationPositionController extends Controller
{
    //
    public function delete($id) {
    	# code...
    	OrganizationPosition::where('organization_position_id', $id)->delete();
			return back();

    }
}
