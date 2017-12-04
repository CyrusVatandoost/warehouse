<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collaborator extends Model {

	protected $primaryKey = 'collaborator_od';

	// $collaboration->project
	public function project() {
    	return $this->belongsTo(Project::class, 'project_id', 'project_id');
	}

	// $collaboration->user
	public function user() {
    	return $this->belongsTo(User::class, 'user_id', 'user_id');
	}

}
