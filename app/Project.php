<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model {

	public function scopeComplete() {
		return static::where('complete', 1);
	}

	public function scopeIncomplete() {
		return static::where('complete', 0);
	}

}
