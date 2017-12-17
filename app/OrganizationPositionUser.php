<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrganizationPositionUser extends Model {

	protected $primary_key = 'organization_position_user_id';

	public function position() {
		# code...
		return $this->hasOne('App\OrganizationPosition', 'organization_position_id','organization_position_id');
	}

	public function role() {
		return $this->belongsTo('App\User','user_id','user_id');
	}
	
  // $user->position->position->name
  // 1st para - where you wanna go 
  // 2nd para - foreignkey of that table
  // 3rd para - attribute you wanna connect with 2nd para

}
