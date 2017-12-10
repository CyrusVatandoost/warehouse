<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrganizationPosition;
use App\Log;

class OrganizationPositionController extends Controller
{
    //
    public function delete($id) {
    	# code...

        //add delete action to logs table
        $log = new Log;
        $position = OrganizationPosition::find($id);

        $log->user_id = auth()->id();
        $log->user_action = "deleted an organization position";
        $log->action_details = $position->name;
        $log->save();
        //end log

    	OrganizationPosition::where('organization_position_id', $id)->delete();
		return back();

    }

    public function store() {
    	# code...

    	$OrganizationPosition = new OrganizationPosition;
    	$OrganizationPosition->organization_id = request('organization_id');
    	$OrganizationPosition->name = request('position');
    	$OrganizationPosition->save();

        //add store action to logs table
        $log = new Log;

        $log->user_id = auth()->id();
        $msg = "added a new " . request('organization_id') . " organization position";
        $log->user_action = $msg;
        $log->action_details = request('position');
        $log->save();
        //end log

    	return back();
    }
}
