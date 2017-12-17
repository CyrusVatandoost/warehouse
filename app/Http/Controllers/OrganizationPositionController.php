<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\OrganizationPosition;
use App\Log;

class OrganizationPositionController extends Controller {

    public function delete($id) {
      $position = OrganizationPosition::where('organization_position_id', $id)->first();

      //add delete action to logs table
      $log = new Log;
      $log->user_id = auth()->id();
      $log->user_action = "deleted an organization position";
      $log->action_details = $position->name;
      $log->save();

      DB::table('organization_positions')->where('organization_position_id', $id)->delete();
/*      OrganizationPosition::destroy($id);*/

		  return back();
    }

    public function store($id) {

    	$organization_position = new OrganizationPosition;
    	$organization_position->organization_id = $id;
    	$organization_position->name = request('position');
    	$organization_position->save();

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
