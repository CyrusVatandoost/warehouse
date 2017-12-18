<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {
	
  public $primaryKey = 'task_id';
  protected $fillable = ['created_by', 'task_name'];

	//$task->user 
	public function user() {
		return $this->belongsTo(User::class, 'user_id');
	}

	//$task->project 
	public function project() {
		return $this->belongsTo(Project::class, 'project_id');
	}

}
