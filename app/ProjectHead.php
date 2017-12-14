<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Project;
use App\User;

class ProjectHead extends Model {

	protected $primaryKey = 'project_head_id';

	public function project() {
    return $this->belongsTo(Project::class, 'project_id', 'project_id');
	}

	public function user() {
    return $this->belongsTo(User::class, 'user_id', 'user_id');
	}

}
