<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $primaryKey = 'announcement_id';
    protected $fillable = ['announcement_name', 'description'];

	//$announcement->user 
	public function user() {
		return $this->belongsTo(User::class, 'user_id');
	}
}
