<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Project;

class FeaturedProject extends Model {

	protected $primaryKey = 'featured_project_id';
  
	public function project() {
		return $this->belongsTo(Project::class, 'project_id', 'project_id');
	}

}
