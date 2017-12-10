<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $primaryKey = 'log_id';
	protected $fillable = ['user_id', 'user_action'];

	//$announcement->user 
	public function user() {
		return $this->belongsTo(User::class, 'user_id');
	}
}
