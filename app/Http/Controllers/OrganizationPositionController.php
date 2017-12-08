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

    public function store() {
    	# code...

    	$OrganizationPosition = new OrganizationPosition;
    	$OrganizationPosition->organization_id = request('organization_id');
    	$OrganizationPosition->name = request('position');
    	$OrganizationPosition->save();
    	return back();
    }
}
