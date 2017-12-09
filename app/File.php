<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model {
  
	protected $primaryKey = 'file_id';

  // $file->project
  public function project() {
  	return $this->belongsTo(Project::class, 'project_id', 'project_id');
  }

}
