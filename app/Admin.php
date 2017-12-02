<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model {

	protected $primaryKey = 'admin_id';

	// $admin->user
	public function user() {
		return $this->belongsTo('users', 'user_id');
	}

}
