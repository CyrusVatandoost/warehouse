<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrganizationPosition extends Model {

	protected $primary_key = 'organization_position_id';
 
	public function position() {
		return $this->hasMany('App\OrganizationPositionUser','organization_position_id','organization_position_id');
	}

}
