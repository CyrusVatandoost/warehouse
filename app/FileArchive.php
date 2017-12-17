<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileArchive extends Model {

	protected $primaryKey = 'file_archive_id';

	public function project() {
  	return $this->belongsTo(Project::class, 'project_id', 'project_id');
	}

}
